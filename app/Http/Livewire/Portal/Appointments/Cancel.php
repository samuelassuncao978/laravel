<?php

namespace App\Http\Livewire\Portal\Appointments;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\Appointment;

// Traits
use App\Traits\Livewire\Modal;

class Cancel extends Component
{
    use Modal;

    public Appointment $appointment;

    public $rules = [];

    public function render()
    {
        return view("segments.portal.appointments.cancel");
    }

    public function save()
    {
        $this->close();
    }
}
