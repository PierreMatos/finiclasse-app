<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewCheckProposalNotification;
use App\Providers\PushCheckProposal;

class SendPushCheckProposalNotification
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
    public function handle(PushCheckProposal $event)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';

        $vendors = User::where([['device_key', '!=', null]])->where('id', '=', $event->proposal->vendor->id)->pluck('device_key')->all();

        $serverKey = env('FIREBASE_KEY');

        $data = [
            "registration_ids" => $vendors,
            "notification" => [
                "title" => 'Proposta em aberto',
                "body" => 'A proposta nº ' . $event->proposal->id . ' está aberta há mais de 8 dias',
            ]
        ];

        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);
        // // FCM response
        // dd($result);

        //Notification
        $vendorsNotification = User::where('id', '=', $event->proposal->vendor->id)->get();

        Notification::send($vendorsNotification, new NewCheckProposalNotification($event->proposal));
        //
    }
}
