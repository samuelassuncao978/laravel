<?php

namespace App\Http\Livewire\Admin\AppointmentTypes;

use App\Http\Livewire\Component;
use Illuminate\Http\Request;
use App\Traits\Livewire\Modal;

// Models
use App\Models\AppointmentType;

class Recover extends Component
{
    use Modal;

    public AppointmentType $appointment_type;

    public $rules = [];

    public function render()
    {
        return view("segments.admin.appointment_types.recover");
    }

    public function save()
    {
        $this->authorize("restore", $this->appointment_type);

        $this->appointment_type->restore();
        $this->close();
    }
}
