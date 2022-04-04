<?php

namespace App\Listeners;

use App\Models\User;
use App\Providers\PushProposalSubmitted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPushProposalSubmittedNotification
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
    public function handle(PushProposalSubmitted $event)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';

        $adminsAndDirectorsAndChefeByStand = User::where([['device_key', '!=', null]])
            ->whereHas('roles', function ($query) {
                $query
                    ->whereIn('roles.name', ['Administrador', 'Diretor comercial']);
            })->orwhere([['device_key', '!=', null]])->whereHas('roles', function ($query) {
                $query->where('roles.name', 'Chefe de vendas');
            })->where('stand_id', $event->proposal->vendor->stand_id)->pluck('device_key')->all();

        $serverKey = env('FIREBASE_KEY');

        $data = [
            "registration_ids" => $adminsAndDirectorsAndChefeByStand,
            "notification" => [
                "title" => 'Nova proposta para validação',
                "body" => 'Proposta nº ' . $event->proposal->id . ' necessita da sua validação',
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
    }
}