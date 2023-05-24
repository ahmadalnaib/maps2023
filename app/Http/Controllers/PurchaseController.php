<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Door;
use App\Models\Plan;
use App\models\User;
use Dompdf\Dompdf;
use App\Models\Locker;
use App\Models\Rental;
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
                    'description' => 'Order Description'
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
             $start_time = Carbon::now();
             $end_time = $start_time->copy()->addDays($plan->number_of_days)->subSecond();

             $locker = Locker::findOrFail($data['locker_id']);
             $door = Door::findOrFail($data['door_id']);

             $rental = new Rental([
                "tenant_id" => $tenantId,
                "locker_id" => $locker->id,
                "user_id" => $user->id,
                'door_id' => $door->id,
                'duration'=>$plan->name,
                'start_time' => $start_time,
                'end_time' => $end_time,
                'plan_id' => $plan->id,
                'price' => $price,
                'created_at' => Carbon::now(),
            ]);

            $rental->save();
            
             // Generate the PDF file
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('emails.payment_confirmation', ['rental' => $rental])->render());

        $dompdf->render();
        $pdfContents = $dompdf->output();

        // Save the PDF file to a temporary location
        $pdfPath = storage_path('app/tmp/invoice.pdf');
        file_put_contents($pdfPath, $pdfContents);
       Mail::to($rental->user->email)->send(new PaymentConfirmation($rental));
        // Cleanup the temporary PDF file
        unlink($pdfPath);
       
        }
        return response()->json($result);
    }




}
