<?php

declare(strict_types=1);

namespace App\Providers;

use App\Events\ActivateApartmentEvent;
use App\Events\ApartmentCreateEvent;
use App\Events\ReservationCancelEvent;
use App\Events\ReservationEvent;
use App\Listeners\ActivateApartmentListener;
use App\Listeners\ApartmentCreateListener;
use App\Listeners\ReservationCancelListener;
use App\Listeners\ReservationListener;
use Illuminate\Auth\Events\Registered;
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
            SendEmailVerificationNotification::class,
        ],
        ApartmentCreateEvent::class => [
            ApartmentCreateListener::class
        ],
        ReservationEvent::class => [
            ReservationListener::class
        ],
        ReservationCancelEvent::class => [
            ReservationCancelListener::class
        ],
        ActivateApartmentEvent::class => [
            ActivateApartmentListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
