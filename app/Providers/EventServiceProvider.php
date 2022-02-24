<?php

namespace App\Providers;

use App\Providers\NewCar;
use App\Providers\NewLead;
use App\Providers\ClosedProposal;
use App\Providers\SharedProposal;
use Illuminate\Auth\Events\Registered;
use App\Listeners\SendNewCarNotification;
use App\Listeners\SendNewLeadNotification;
use App\Listeners\SendNewUserNotification;
use App\Listeners\SendClosedProposalNotification;
use App\Listeners\SendSharedProposalNotification;
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
