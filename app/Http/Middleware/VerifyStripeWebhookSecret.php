<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Stripe\WebhookSignature;
use Symfony\Component\HttpFoundation\Response;

class VerifyStripeWebhookSecret
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');


            try {
                WebhookSignature::verifyHeader(
                    $request->getContent(),
                    $request->header('Stripe-signature'),
                    $endpoint_secret



                );
             
            } catch (SignatureVerificationException $exception) {
                // Invalid payload
                throw new AccessDeniedHttpException($exception->getMessage(),$exception);
            }


        return $next($request);
    }
}
