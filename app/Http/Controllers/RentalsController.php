<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Dompdf\Dompdf;
use App\Models\Door;
use App\Models\Plan;
use App\Models\Locker;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Mail\PaymentConfirmation;
use Illuminate\Support\Facades\Mail;

class RentalsController extends Controller
{
    public function rent(Request $request)
    {
        $validatedData = $request->validate([
            'locker_id' => 'required|exists:lockers,id',
            'door_id' => 'required|exists:doors,id',
            'rental_period' => 'required|exists:plans,id',
        ]);

        $locker = Locker::findOrFail($validatedData['locker_id']);
        $door = Door::findOrFail($validatedData['door_id']);
        $plan = Plan::findOrFail($validatedData['rental_period']);

        $start_time = Carbon::now();

        // Calculate end time based on plan's number of days
        $end_time = $start_time->copy()->addDays($plan->number_of_days)->subSecond();

        // Calculate price based on plan's price
        $price = $plan->price;
        $intent=auth()->user()->createSetupIntent();


        // Create the rental record
        $rental = new Rental([
            "locker_id" => $locker->id,
            "user_id" => auth()->id(),
            'door_id' => $door->id,
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
            'locker' => $locker,
            'address' => $locker->address,
            'door' => $door,
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
           // Encrypt the locker and door IDs
            // $lockerId = encrypt($request->input('locker_id'));
            // $doorId = encrypt($request->input('door_id'));
            $lockerId = $request->input('locker_id');
            $doorId = $request->input('door_id');
            $price = $plan->price;
            $total = $price;

    try {
        $user->createOrGetStripeCustomer();
        $user->updateDefaultPaymentMethod($paymentMethod);
        $user->charge($total * 100, $paymentMethod, [
            'metadata' =>
            ['locker_id' => $lockerId, 
            'door_id' => $doorId,
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
                "locker_id" => $lockerId,
                "user_id" => $user->id,
                'door_id' => $doorId,
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

    return redirect()->route('invoices.index')->with('message', 'Rental purchased successfully.');



}

 
}
