<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Dompdf\Dompdf;
use App\Models\Box;
use App\Models\Door;
use App\Models\Plan;
use App\Models\Locker;
use App\Models\Rental;
use App\Models\System;
use Illuminate\Http\Request;
use App\Mail\PaymentConfirmation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;

class RentalsController extends Controller
{
    public function rent(Request $request)
    {
        $validatedData = $request->validate([
            'system_id' => 'required|exists:systems,id',
            'box_id' => 'required|exists:boxes,id',
            'rental_period' => 'required|exists:plans,id',
        ]);

        $system = System::findOrFail($validatedData['system_id']);
        $box = Box::findOrFail($validatedData['box_id']);
        $plan = Plan::findOrFail($validatedData['rental_period']);

        $start_time = Carbon::now();

        // Calculate end time based on plan's number of days
        $end_time = $start_time->copy()->addDays($plan->number_of_days)->subSecond();

        // Calculate price based on plan's price
        $price = $plan->price;
        $intent=auth()->user()->createSetupIntent();

    
        // Create the rental record
        
        $rental = new Rental([
            "system_id" => $system->id,
            "user_id" => auth()->id(),
            'box_id' => $box->id,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'plan_id' => $plan->id,
            'price' => $price,
            'created_at' => Carbon::now(),
        ]);

        // Save the rental record
        // $rental->save();

        return view('rentals', [
            'rental' => $rental,
            'system' => $system,
            'address' => $system->address,
            'box' => $box,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'plan'=>$plan,
            'intent'=>$intent,
         
            
        ]);
    }



     public function creditCheckout(Request $request)
     {
        $intent = auth()->user()->createSetupIntent();
        $user = auth()->user();
        $price = $plan->price;
        $total = $price; // Set total equal to the plan price
              return view('credit.checkout',compact('intent','total'));
 
     }

 
 
     public function purchase(Request $request, Plan $plan, )
{

            $user = $request->user();
            $paymentMethod = $request->input('payment_method');
            $encryptedSystemId = $request->input('system_id');
            $encryptedBoxId = $request->input('box_id');
            
            // Decrypt the encrypted IDs
            $systemId = Crypt::decrypt($encryptedSystemId);
            $boxId = Crypt::decrypt($encryptedBoxId);
            
            // Validate the IDs and user authorization
            $system = System::findOrFail($systemId);
            $box = Box::findOrFail($boxId);
            $price = $plan->price;
            $total = $price;

         
   

    try {
        $user->createOrGetStripeCustomer();
        $user->updateDefaultPaymentMethod($paymentMethod);
        $user->charge($total * 100, $paymentMethod, [
            'metadata' =>
            ['system_id' => $systemId, 
            'box_id' => $boxId,
            'tenant_id '=> $user->tenant->id,
            ]
           ]); // * 100 because Stripe deals with cents
    } catch (\Exception $exception) {
        return back()->with('error', 'Error processing payment: ' . $exception->getMessage());
    }
    $start_time = Carbon::now();
    $end_time = $start_time->copy()->addDays($plan->number_of_days)->subSecond();
    $tenantId = $user->tenant->id;
    $pincode = mt_rand(100000, 999999);

      // Create a new rental record
      $rental = Rental::create([
        "tenant_id" => $tenantId,
                "system_id" => $systemId,
                "user_id" => $user->id,
                'box_id' => $boxId,
                'duration'=>$plan->name,
                'start_time' => $start_time,
                'end_time' => $end_time,
                'plan_id' => $plan->id,
                'price' => $price,
                'pincode' => $pincode,
                'created_at' => Carbon::now(),
        // 'payment_method' => 'stripe', // or any other payment method identifier
      
        // Add any other relevant fields you have in your Rental model
    ]);
     // Generate the PDF file
     $dompdf = new Dompdf();
     $dompdf->loadHtml(view('emails.payment_confirmation', ['rental' => $rental])->render());

     $dompdf->render();
     $pdfContents = $dompdf->output();

     // Save the PDF file to a temporary location
     $pdfPath = storage_path('app/tmp/invoice.pdf');
     file_put_contents($pdfPath, $pdfContents);
     // Send the pin code email
  

    Mail::to($rental->user->email)->send(new PaymentConfirmation($rental));
     // Cleanup the temporary PDF file
     unlink($pdfPath);
    


    // Additional logic or redirects if needed

    return redirect()->route('invoices.index')->with('message', 'Miete erfolgreich erworben.');



}

 
}
