<?php

namespace App\Listeners;

use App\Models\User;
use App\Providers\PushValidatedTradeIn;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewValidatedTradeInNotification;

class SendPushValidatedTradeInNotification
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
    public function handle(PushValidatedTradeIn $event)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';

        $vendors = User::where([['device_key', '!=', null]])->pluck('device_key')->all();

        $serverKey = env('FIREBASE_KEY');

        $data = [
            "registration_ids" => $vendors,
            "notification" => [
                "title" => 'Retoma validada',
                "body" => 'Proposta nº ' . $event->car->proposalTradeIn->id
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
         $vendorsNotification = User::whereHas('roles', function ($query) {
            $query->whereIn('roles.name', ['Administrador']);
        })->get();

        Notification::send($vendorsNotification, new NewValidatedTradeInNotification($event->car));
        //
    }
}