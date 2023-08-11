<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Box;
use Ramsey\Uuid\Uuid;
use App\Models\Rental;
use App\Models\System;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Mail\PaymentConfirmation;
use Illuminate\Support\Facades\Mail;
use App\Http\Middleware\VerifyStripeWebhookSecret;

class StripeWebhookController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(VerifyStripeWebhookSecret::class);
    }

    public function __invoke(Request $request)
    {
        $payload=json_decode($request->getContent(),true);

        // \Log::info($payload);

        $method='handle'. Str::studly(str_replace('.','_',$payload['type']));

        if(method_exists($this,$method)){
            $response=$this->{$method}($payload);

            return $response;
        }

        return new Response();
    }

    protected function handleCheckoutSessionCompleted(array $payload)
    {

            //  \Log::info($payload);
      
    
      
      
    
    
        $paymentStatus = data_get($payload, 'data.object.payment_status', null);
        $priceInCents = $payload['data']['object']['amount_subtotal'];
        $priceInEur = $priceInCents / 100;
    
        // Create a new rental record in the database for the found system
        $rental = Rental::create([
            // 'email' => $email,
            'tenant_id'=>$payload['data']['object']['metadata']['tenant_id'],
            'system_id' => $payload['data']['object']['metadata']['system_id'],
            "user_id" => $payload['data']['object']['metadata']['user_id'],
            'session_id' => $payload['data']['object']['id'],
            'price' => $priceInEur ,
            'status' => $paymentStatus === 'paid' ? 'paid' : null,
            'plan_id'=>$payload['data']['object']['metadata']['plan_id'],
            'box_id' => $payload['data']['object']['metadata']['box_id'],
            'uuid' => Uuid::uuid4()->toString(),
            'duration' => $payload['data']['object']['metadata']['duration'],
            'start_time' => $payload['data']['object']['metadata']['start_time'],
            'end_time' => $payload['data']['object']['metadata']['end_time'],
            'pincode' =>  mt_rand(100000000, 999999999),
        ]);

        $boxId = $payload['data']['object']['metadata']['box_id'];
        $box = Box::findOrFail($boxId);
        $box->rental_uuid = $rental->uuid;
        $box->occupied = true;
        $box->save();

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
    
    
}
