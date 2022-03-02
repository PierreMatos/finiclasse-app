<?php

namespace App\Providers;

use App\Providers\NewCar;
use App\Providers\NewLead;
use App\Providers\PushNewUser;
use App\Providers\ClosedProposal;
use App\Providers\PushAddTradeIn;
use App\Providers\SharedProposal;
use Illuminate\Auth\Events\Registered;
use App\Providers\PushProposalSubmitted;
use App\Listeners\SendNewCarNotification;
use App\Listeners\SendNewLeadNotification;
use App\Listeners\SendNewUserNotification;
use App\Listeners\SendPushNewUserNotification;
use App\Listeners\SendClosedProposalNotification;
use App\Listeners\SendPushAddTradeInNotification;
use App\Listeners\SendSharedProposalNotification;
use App\Listeners\SendPushProposalSubmittedNotification;
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
