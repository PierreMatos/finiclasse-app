<?php

namespace App\Providers;

use App\Providers\NewCar;
use App\Providers\NewLead;
use App\Providers\PushRGPD;
use App\Providers\PushNewLead;
use App\Providers\PushNewUser;
use App\Providers\ClosedProposal;
use App\Providers\PushAddTradeIn;
use App\Providers\SharedProposal;
use App\Providers\PushCheckProposal;
use App\Providers\PushRejectedTradeIn;
use Illuminate\Auth\Events\Registered;
use App\Providers\PushValidatedTradeIn;
use App\Providers\PushProposalSubmitted;
use App\Providers\PushValidatedProposal;
use App\Providers\PushProposalRequestDeny;
use App\Providers\PushProposalRequestAccept;
use App\Listeners\SendNewCarNotification;
use App\Listeners\SendNewLeadNotification;
use App\Listeners\SendNewUserNotification;
use App\Listeners\SendPushRGPDNotification;
use App\Listeners\SendPushNewLeadNotification;
use App\Listeners\SendPushNewUserNotification;
use App\Listeners\SendClosedProposalNotification;
use App\Listeners\SendPushAddTradeInNotification;
use App\Listeners\SendSharedProposalNotification;
use App\Listeners\SendPushCheckProposalNotification;
use App\Listeners\SendPushRejectedTradeInNotification;
use App\Listeners\SendPushValidatedTradeInNotification;
use App\Listeners\SendPushProposalSubmittedNotification;
use App\Listeners\SendPushValidatedProposalNotification;
use App\Listeners\SendPushProposalRequestDenyNotification;
use App\Listeners\SendPushProposalRequestAcceptNotification;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            // SendEmailVerificationNotification::class,
            SendNewUserNotification::class
        ],
        NewCar::class => [
            SendNewCarNotification::class
        ],
        SharedProposal::class => [
            SendSharedProposalNotification::class
        ],
        ClosedProposal::class => [
            SendClosedProposalNotification::class
        ],
        NewLead::class => [
            SendNewLeadNotification::class
        ],
        PushNewUser::class => [
            SendPushNewUserNotification::class
        ],
        PushAddTradeIn::class => [
            SendPushAddTradeInNotification::class
        ],
        PushProposalSubmitted::class => [
            SendPushProposalSubmittedNotification::class
        ],
        PushNewLead::class => [
            SendPushNewLeadNotification::class
        ],
        PushValidatedTradeIn::class => [
            SendPushValidatedTradeInNotification::class
        ],
        PushRGPD::class => [
            SendPushRGPDNotification::class
        ],
        PushValidatedProposal::class => [
            SendPushValidatedProposalNotification::class
        ],
        PushCheckProposal::class => [
            SendPushCheckProposalNotification::class
        ],
        PushRejectedTradeIn::class => [
            SendPushRejectedTradeInNotification::class
        ],
        PushProposalRequestDeny::class => [
            SendPushProposalRequestDenyNotification::class
        ],
        PushProposalRequestAccept::class => [
            SendPushProposalRequestAcceptNotification::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
