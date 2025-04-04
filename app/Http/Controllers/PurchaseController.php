<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Dompdf\Dompdf;
use App\Models\Box;
use App\Models\Door;
use App\Models\Plan;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Models\Locker;
use App\Models\Rental;
use App\Models\System;
use Illuminate\Http\Request;
use App\Mail\PaymentConfirmation;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PurchaseController extends Controller
{
    //
    private $provider;

    function __construct() {
        $this->provider = new PayPalClient;
        $this->provider->setApiCredentials(config('paypal'));
        $token = $this->provider->getAccessToken();
        $this->provider->setAccessToken($token);
        $this->provider->setCurrency('EUR');
        
    }
    public function createPayment(Request $request) {

        $data = json_decode($request->getContent(), true);
  
        

 // Retrieve the plan based on the rental_period ID
        $plan = Plan::findOrFail($data['rental_period']);
        $user = User::find($data['userId']);
        $system = System::findOrFail($data['system_id']);
        $box = Box::findOrFail($data['box_id']);

   
        
    // Calculate the total price based on the plan's price
    $total = $plan->price;




    
        

        $order = $this->provider->createOrder([
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => "EUR",
                        'value' => $total
                    ],
                    'description' => "User: " . $user->id . ", System: " . $system->id . ", Box: " . $box->id

                ]
            ],
        ]);

        return response()->json($order);
    }

    public function executePayment(Request $request) {

        $data = json_decode($request->getContent(), true);
   

        $result = $this->provider->capturePaymentOrder($data['orderId']);

        if($result['status'] === 'COMPLETED') {
            $user = User::find($data['userId']);
            $tenantId = $user->tenant->id;
             // Retrieve the rental data from the RentalsController
   
             $plan = Plan::findOrFail($data['rental_period']);
             $price = $plan->price;
            //  $start_time = Carbon::now('Europe/Berlin')->tz('Europe/Berlin');
            $start_time = Carbon::now('UTC');
           
             $durationUnit = $plan->duration_unit;

             if ($durationUnit === 'days') {
                $end_time = $start_time->copy()->addDays($plan->number_of_days)->subSecond();
            } elseif ($durationUnit === 'hours') {
                $end_time = $start_time->copy()->addHours($plan->number_of_days)->subSecond();
            } elseif ($durationUnit === 'minutes') {
                $end_time = $start_time->copy()->addMinutes($plan->number_of_days)->subSecond();
            } else {
                // Handle unknown duration_unit or default behavior if needed
                $end_time = $start_time->copy()->addDays($plan->number_of_days)->subSecond();
            }

             $system = System::findOrFail($data['system_id']);
             $box = Box::findOrFail($data['box_id']);

            // Generate a 6-digit pincode
            $pincode = mt_rand(100000000, 999999999);

             $rental = new Rental([
                "tenant_id" => $tenantId,
                "system_id" => $system->id,
                "user_id" => $user->id,
                'box_id' => $box->id,
                'duration'=>$plan->name,
                'start_time' => $start_time,
                'end_time' => $end_time,
                'plan_id' => $plan->id,
                'price' => $price,
                'uuid' => Uuid::uuid4()->toString(),
                'pincode' => $pincode,
                'created_at' => Carbon::now(),
            ]);

            $rental->save();

                    // Save rental_uuid in the boxes table
                $box = Box::findOrFail($data['box_id']);
                $box->rental_uuid = $rental->uuid;
                $box->occupied = true;
                $box->save();
  
            
             // Generate the PDF file
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('emails.payment_confirmation', ['rental' => $rental])->render());

        $dompdf->render();
        $pdfContents = $dompdf->output();

        // Save the PDF file to a temporary location
        $pdfPath = storage_path('app/tmp/rechnung.pdf');
        file_put_contents($pdfPath, $pdfContents);
        // Send the pin code email
     

       Mail::to($rental->user->email)->send(new PaymentConfirmation($rental));
        // Cleanup the temporary PDF file
        unlink($pdfPath);
        
        }
        return response()->json($result);
    }
   



   




}
