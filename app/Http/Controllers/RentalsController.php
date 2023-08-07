<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Dompdf\Dompdf;
use App\Models\Box;
use App\Models\Door;
use App\Models\Plan;
use Ramsey\Uuid\Uuid;
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
        $durationUnit = $plan->duration_unit;
        // $start_time = Carbon::now('Europe/Berlin')->tz('Europe/Berlin');
        $start_time = Carbon::now();

        if ($durationUnit === 'days') {
            // Calculate end time based on plan's number of days
            $end_time = $start_time->copy()->addDays($plan->number_of_days)->subSecond();
        } elseif ($durationUnit === 'hours') {
            // Calculate end time based on plan's number of hours
            $end_time = $start_time->copy()->addHours($plan->number_of_days)->subSecond();
        }
        // Calculate price based on plan's price
        $price = $plan->price;
        $total = $price;
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
            'start_time' => $start_time->tz('Europe/Berlin'),
            'end_time' => $end_time->tz('Europe/Berlin'),
            'plan'=>$plan,
            'total' => $total,
            'intent'=>$intent,
            'duration_unit' => $durationUnit,
         
            
        ]);
    }



    //  public function creditCheckout(Request $request)
    //  {
    //     $intent = auth()->user()->createSetupIntent();
    //     $user = auth()->user();
    //     $price = $plan->price;
    //     $total = $price; // Set total equal to the plan price
    //           return view('credit.checkout',compact('intent','total'));
 
    //  }

 
 
     public function purchase(Request $request, Plan $plan)
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
<<<<<<< HEAD
            $price = $plan->price;
            $total = $price;
            
=======
            $total = $plan->price;
          
>>>>>>> aec3c068f5188962b08d9b64ea677338f1f291c0

        
   

<<<<<<< HEAD
           return $payment= $request->user()->checkoutCharge($total *100, 'T-Shirt', 1);
           dd($payment);


=======
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

    // dd($request->all());
>>>>>>> aec3c068f5188962b08d9b64ea677338f1f291c0
    // $start_time = Carbon::now('Europe/Berlin')->tz('Europe/Berlin');
    $start_time = Carbon::now('UTC');
    $durationUnit = $plan->duration_unit;
    
    if ($durationUnit === 'days') {
        $end_time = $start_time->copy()->addDays($plan->number_of_days)->subSecond();
    } elseif ($durationUnit === 'hours') {
        $end_time = $start_time->copy()->addHours($plan->number_of_days)->subSecond();
    } else {
        // Handle unknown duration_unit or default behavior if needed
        $end_time = $start_time->copy()->addDays($plan->number_of_days)->subSecond();
    }


    $tenantId = $user->tenant->id;
    $pincode = mt_rand(100000000, 999999999);

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
                'price' => $total,
                'pincode' => $pincode,
                'uuid' => Uuid::uuid4()->toString(),
                'created_at' => Carbon::now(),
        // 'payment_method' => 'stripe', // or any other payment method identifier
      
        // Add any other relevant fields you have in your Rental model
    ]);

    $box = Box::findOrFail($boxId);
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
    


    // Additional logic or redirects if needed

    return redirect()->route('invoices.index')->with('message', 'Miete erfolgreich erworben.');



}

public function save(Request $request, Plan $plan)
{
    // Retrieve the rental data from the request and save it to the database
    $validatedData = $request->validate([
        'system_id' => 'required|exists:systems,id',
        'box_id' => 'required|exists:boxes,id',
        'rental_period' => 'required|exists:plans,id',
    ]);

    $system = System::findOrFail($validatedData['system_id']);
    $box = Box::findOrFail($validatedData['box_id']);
    $plan = Plan::findOrFail($validatedData['rental_period']);
    // $start_time = Carbon::now('Europe/Berlin')->tz('Europe/Berlin');
    $start_time = Carbon::now('UTC');
    $durationUnit = $plan->duration_unit;

    if ($durationUnit === 'days') {
        $end_time = $start_time->copy()->addDays($plan->number_of_days)->subSecond();
    } elseif ($durationUnit === 'hours') {
        $end_time = $start_time->copy()->addHours($plan->number_of_days)->subSecond();
    } else {
        // Handle unknown duration_unit or default behavior if needed
        $end_time = $start_time->copy()->addDays($plan->number_of_days)->subSecond();
    }

    $price = $plan->price;
    $pincode = mt_rand(100000000, 999999999);

    $rental = new Rental([
        "system_id" => $system->id,
        "user_id" => auth()->id(),
        'box_id' => $box->id,
        'start_time' => $start_time,
        'end_time' => $end_time,
        'duration'=>$plan->name,
        'plan_id' => $plan->id,
        'price' => $price,
        'pincode' => $pincode,
        'uuid' => Uuid::uuid4()->toString(),
        'created_at' => Carbon::now(),
    ]);

  
  

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
    


    $rental->save();

 
    // Save rental_uuid in the boxes table
    $box = Box::findOrFail($validatedData['box_id']);
    $box->rental_uuid = $rental->uuid;
    $box->occupied = true;
    $box->save();


    // Perform any additional actions or redirects as needed
    return redirect()->route('invoices.index')->with('message', 'Miete erfolgreich erworben.');
}



 
}
