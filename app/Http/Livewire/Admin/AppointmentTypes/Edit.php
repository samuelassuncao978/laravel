<?php

namespace App\Http\Livewire\Admin\AppointmentTypes;

use App\Http\Livewire\Component;
use Illuminate\Http\Request;
use App\Traits\Livewire\Modal;

// Models
use App\Models\AppointmentType;

class Edit extends Component
{
    use Modal;

    public AppointmentType $appointment_type;

    public $rules = [
        "appointment_type.name" => "string|required",
        "appointment_type.icon" => "string",
        "appointment_type.duration" => "decimal|required",
        "appointment_type.charge" => "number|required",
    ];

    public function render()
    {
        return view("segments.admin.appointment_types.edit");
    }

    public function save()
    {
        $this->validate();
        $this->authorize("update", $this->appointment_type);

        $this->appointment_type->save();
        $this->close();
    }
}
