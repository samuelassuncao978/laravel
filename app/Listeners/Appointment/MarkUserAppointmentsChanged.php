<?php

namespace App\Listeners\Appointment;

use App\Events\Appointment\AppointmentChanged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MarkUserAppointmentsChanged
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
     * @param  \App\Events\Appointment\AppointmentChanged  $event
     * @return void
     */
    public function handle(AppointmentChanged $event)
    {
        /**
         * Mark that any of the specified user's appointments changed
         */
        $event->user->appointmentsChanged();

        /**
         * Regenerate appointment available slots for the specified user
         */
        $event->user->regenerateAppointmentAvailableSlots();
    }
}
