<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Http\Livewire\Component;

// Models
use App\Models\Appointment;

// Traits
use App\Traits\Livewire\Modal;

class Resend extends Component
{
    use Modal;

    public Appointment $appointment;
    public $notify_client = true;
    public $notify_counsellor = false;

    public $rules = [];

    public function render()
    {
        return view("segments.admin.appointments.resend");
    }

    public function save()
    {
        $this->close();
    }
}
