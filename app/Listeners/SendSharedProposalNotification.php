<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewSharedProposalNotification;

class SendSharedProposalNotification
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
        $adminsAndDirectorsAndChefeByStand = User::whereHas('roles', function ($query) {
            $query->where('id', 85)->orWhere('id', 86);
        })->orWhereHas('roles', function ($query) {
            $query->where('id', 87);
        })->where('stand_id', $event->proposal->vendor->stand_id)->get();

        Notification::send($adminsAndDirectorsAndChefeByStand, new NewSharedProposalNotification($event->proposal));
    }
}
