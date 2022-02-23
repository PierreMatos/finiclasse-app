<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\NewCarNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class SendNewCarNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $employees = User::whereHas('roles', function ($query) {
            $query->where('id', 85)->orWhere('id', 86)->orWhere('id', 87)->orWhere('id', 88);
        })->get();

        Notification::send($employees, new NewCarNotification($event->car));
    }
}
