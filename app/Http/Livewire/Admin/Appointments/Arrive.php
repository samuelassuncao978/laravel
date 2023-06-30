<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Http\Livewire\Component;

// Notifications
use App\Notifications\Users\Appointments\ClientArrivedNotification;

// Models
use App\Models\Appointment;

// Traits
use App\Traits\Livewire\Modal;

class Arrive extends Component
{
    use Modal;

    public Appointment $appointment;
    public $notify = true;

    public $rules = [];

    public function render()
    {
        return view("segments.admin.appointments.arrive");
    }

    public function save()
    {
        $this->appointment->arrived_at = now();
        $this->appointment->save();

        if ($this->notify) {
            $this->appointment
                ->users()
                ->first()
                ->notify(new ClientArrivedNotification($this->appointment));
        }

        $this->close();
    }
}
