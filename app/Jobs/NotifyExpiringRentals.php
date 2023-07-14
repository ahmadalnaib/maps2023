<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\Rental;
use Illuminate\Bus\Queueable;
use App\Notifications\RentalEnd;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class NotifyExpiringRentals implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        


        //  $endLimit = Carbon::now('Europe/Berlin')->tz('Europe/Berlin')->addHours(3); // Change from subHours to addHours
        $endLimit = Carbon::now('Europe/Berlin')->tz('Europe/Berlin')->addMinutes(59);


        $rentals = Rental::where('end_time', '<', $endLimit)->where('notifiedsms',false)->get(); 
        foreach ($rentals as $rental) {
            $user = $rental->user;
    
            if ($user) {
                $user->notify(new RentalEnd());
                  // Mark the rental as notified
                $rental->notifiedsms = true;
                $rental->save();
            }
        }
    }
    
}
