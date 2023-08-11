<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\Rental;
use Illuminate\Bus\Queueable;
use App\Mail\RentalBeforExpired;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendRentalBeforExpiredEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(Rental $rental)
    {
        //
        $this->rental = $rental;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        // $endLimit = Carbon::now('Europe/Berlin')->tz('Europe/Berlin')->addMinutes(59);
         $endLimit = Carbon::now('UTC')->addMinutes(29);
        $rentals = Rental::where('end_time', '<', $endLimit)
                        ->where('notifiedemail', false)
                        ->get();
        // if (!$rentals){
        //     Log::info('no rental found');
        // }
        foreach ($rentals as $rental) {
            $user = $rental->user;
            $system = $rental->system;
            // if (!$system){
            //     Log::info('system not found for id '.$rental->id);
            // }

            if ($user) {
             Mail::to($user->email)->send(new RentalBeforExpired($rental));

                // Mark the rental as notified
                $rental->notifiedemail = true;
                $rental->save();
            }
        }
    }
}
