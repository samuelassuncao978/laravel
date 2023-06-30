<?php

namespace App\Http\Livewire\Admin\AppointmentTypes;

use App\Http\Livewire\Component;

use Illuminate\Http\Request;

// Models
use App\Models\AppointmentType;

//Traits
use App\Traits\Livewire\Modal;

class Create extends Component
{
    use Modal;

    public AppointmentType $appointment_type;

    public $rules = [
        "appointment_type.name" => "string|required",
        "appointment_type.icon" => "string",
        "appointment_type.duration" => "decimal|required",
        "appointment_type.charge" => "number|required",
    ];

    public function mount()
    {
        $this->appointment_type = new AppointmentType();
    }

    public function render()
    {
        return view("segments.admin.appointment_types.create");
    }

    public function save()
    {
        $this->validate();
        $this->authorize("create", $this->appointment_type);

        $this->appointment_type->save();
        $this->close();
    }
}
