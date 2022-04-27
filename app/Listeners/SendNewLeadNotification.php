<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\NewLeadNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class SendNewLeadNotification
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
        $adminsAndDirectors = User::whereHas('roles', function ($query) {
            $query->whereIn('roles.name', ['Administrador', 'Diretor comercial']);
        })->get();

        Notification::send($adminsAndDirectors, new NewLeadNotification($event->user));
    }
}
