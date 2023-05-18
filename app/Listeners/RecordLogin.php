<?php

namespace App\Listeners;

use App\Models\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RecordLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        if($event->user->tenant_id) {
            Login::create([
                'user_id' => $event->user->id,
                'tenant_id' => $event->user->tenant_id,
            ]);
        }
    }
}
