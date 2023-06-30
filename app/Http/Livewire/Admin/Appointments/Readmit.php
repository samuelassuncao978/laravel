<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Http\Livewire\Component;

// Models
use App\Models\Appointment;

// Traits
use App\Traits\Livewire\Modal;

class Readmit extends Component
{
    use Modal;

    public Appointment $appointment;

    public $rules = [];

    public function render()
    {
        return view("segments.admin.appointments.readmit");
    }

    public function save()
    {
        $this->appointment->discharged_at = null;
        $this->appointment->save();
        $this->close();
    }
}
