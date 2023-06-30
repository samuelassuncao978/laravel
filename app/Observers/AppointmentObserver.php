<?php

namespace App\Observers;

use App\Models\Appointment;
use App\Events\Appointment\AppointmentChanged;

class AppointmentObserver
{
    /**
     * Handle the Appointment "created" event.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return void
     */
    public function created(Appointment $appointment)
    {
        $this->fireEventWhenChanges($appointment);
    }

    /**
     * Handle the Appointment "updated" event.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return void
     */
    public function updated(Appointment $appointment)
    {
        $this->fireEventWhenChanges($appointment);
    }

    /**
     * Handle the Appointment "deleted" event.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return void
     */
    public function deleted(Appointment $appointment)
    {
        $this->fireEventWhenChanges($appointment);
    }

    /**
     * Handle the Appointment "restored" event.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return void
     */
    public function restored(Appointment $appointment)
    {
        //
    }

    /**
     * Handle the Appointment "force deleted" event.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return void
     */
    public function forceDeleted(Appointment $appointment)
    {
        //
    }

    /**
     * Fire the event when an appointment changes
     * 
     * @param  \App\Models\Appointment  $appointment
     * @return void
     */
    protected function fireEventWhenChanges(Appointment $appointment)
    {
        # Fire the event for each appointment user
        $appointment->users->each(function($user) {
            event(new AppointmentChanged($user));
        });
    }
}
