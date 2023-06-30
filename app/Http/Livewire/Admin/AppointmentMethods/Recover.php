<?php

namespace App\Http\Livewire\Admin\AppointmentMethods;

use App\Http\Livewire\Component;
use Illuminate\Http\Request;
use App\Traits\Livewire\Modal;

// Models
use App\Models\AppointmentMethod;

class Recover extends Component
{
    use Modal;

    public AppointmentMethod $appointment_method;

    public function render()
    {
        return view("segments.admin.appointment_methods.recover");
    }

    public function save()
    {
        $this->authorize("restore", $this->appointment_method);

        $this->appointment_method->restore();
        $this->close();
    }
}
