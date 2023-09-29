<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\Rental;
use App\Mail\RentalExpired;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendRentalExpiredEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(Rental $rental)
    {
        $this->rental = $rental;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        
   

        // $endLimit = \Carbon\Carbon::now('Europe/Berlin')->tz('Europe/Berlin');
        $endLimit = Carbon::now('UTC');
        $rentals = Rental::with('user') // Eager load the user relationship
        ->where('end_time', '<', $endLimit)
        ->where('notified', false)
        ->get();

            foreach ($rentals as $rental) {
                $user = $rental->user;

                if ($user) {
                 Mail::to($user->email)->send(new RentalExpired($rental));

                    // Mark the rental as notified
                    $rental->notified = true;
                    $rental->save();
                }
            }


            }
        }
