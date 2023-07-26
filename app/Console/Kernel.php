<?php

namespace App\Console;

use App\Models\Rental;
use App\Jobs\NotifyExpiringRentals;
use App\Jobs\SendRentalExpiredEmail;
use App\Jobs\SendRentalBeforExpiredEmail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('backup:clean')->daily()->at('18:00');
        $schedule->command('backup:run')->daily()->at('18:30');
        //  $schedule->job(NotifyExpiringRentals::class)->everyMinute();
         $schedule->job(SendRentalExpiredEmail::class)->everyMinute();
         $schedule->job(SendRentalBeforExpiredEmail::class)->everyMinute();
     
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
