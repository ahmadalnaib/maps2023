<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Box;
use App\Models\Plan;
use App\Models\System;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class RentalCheckoutController extends Controller
{
    //

    public function __invoke(Request $request, Plan $plan)
    {

        $user = $request->user();
        $tenantId = $user->tenant->id;
        $encryptedSystemId = $request->input('system_id');
        $encryptedBoxId = $request->input('box_id');
        
        // Decrypt the encrypted IDs
        $systemId = Crypt::decrypt($encryptedSystemId);
        $boxId = Crypt::decrypt($encryptedBoxId);
        
        // Validate the IDs and user authorization
        $system = System::findOrFail($systemId);
        $box = Box::findOrFail($boxId);

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

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = \Stripe\Customer::create([
            'email' => $user->email, 
            
         
        ]);

        
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

          
        $lineItems[] = [
            'price_data' => [
                'currency' => 'eur',
                'product_data' => [
                    'name' =>'Mietgebühr:'. ' ' .$plan->name,
                    // 'description' => 'test',
                  
                ],
                'unit_amount' => $plan->price * 100,
            ],
            'quantity' => 1,
        ];
    
    $session = \Stripe\Checkout\Session::create([
        'line_items' => $lineItems,
        'mode' => 'payment',
        'success_url' => route('rentals.success', []) , 
        'cancel_url' => route('home', []),
        'customer' => $customer->id,
        'payment_intent_data'=>
        ['metadata' =>
        [
           
             "user_id" => $user->id,
             'plan_id'=>$plan->id,
             'system_id' => $systemId, 
              'box_id' => $boxId,
             
              
          ]
        ],
        'metadata'=>[
          "tenant_id" => $tenantId,
           "user_id" => $user->id,
           'plan_id'=>$plan->id,
           'duration'=>$plan->name,
           'system_id' => $systemId, 
            'box_id' => $boxId,
            'user'=> $user->id,
            'start_time' => $start_time,
            'end_time' => $end_time,
        ],
       
      
    ]);

 

    return redirect($session->url);
    }
}
