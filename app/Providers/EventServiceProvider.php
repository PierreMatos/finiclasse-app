<?php

namespace App\Providers;

use App\Providers\NewCar;
use Illuminate\Auth\Events\Registered;
use App\Listeners\SendNewCarNotification;
use App\Listeners\SendNewUserNotification;
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
