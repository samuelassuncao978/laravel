<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\Appointment\AppointmentChanged;
use App\Listeners\Appointment\MarkUserAppointmentsChanged;
use App\Models\Appointment;
use App\Observers\AppointmentObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [SendEmailVerificationNotification::class],
        AppointmentChanged::class => [
            MarkUserAppointmentsChanged::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Appointment::observe(AppointmentObserver::class);
    }
}
