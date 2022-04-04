<?php

namespace App\Listeners;

use App\Models\User;
use App\Providers\PushValidatedProposal;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPushValidatedProposalNotification
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
    public function handle(PushValidatedProposal $event)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';

        $vendors = User::where([['device_key', '!=', null]])->pluck('device_key')->all();

        $serverKey = 'AAAAvNLu5aI:APA91bFzxmRimj21AEFYUTRoKPmnWjcMle_kniqhi0kpM2uB6AbHI3JSo7ZI-_hFd-Uosju8xwDEmJ9JXBr_u5l8zB1HukpsWaedDB9We7GGq1m6QA5FeJbb07SwKc23fvTGMQ4dWlsI';

        $data = [
            "registration_ids" => $vendors,
            "notification" => [
                "title" => 'Proposta validada',
                "body" => 'A proposta nº ' . $event->proposal->id . ' pode ser partilhada',
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
