<?php

namespace App\Http\Livewire\Admin\AppointmentMethods;

use App\Http\Livewire\Component;

use Illuminate\Http\Request;

use App\Traits\Livewire\Modal;

// Models
use App\Models\AppointmentMethod;

class Create extends Component
{
    use Modal;

    public AppointmentMethod $appointment_method;

    public $rules = [
        "appointment_method.name" => "string|required",
        "appointment_method.icon" => "string",
    ];

    public function mount()
    {
        $this->appointment_method = new AppointmentMethod();
    }

    public function render()
    {
        return view("segments.admin.appointment_methods.create");
    }

    public function save()
    {
        $this->validate();
        $this->authorize("create", $this->appointment_method);

        $this->appointment_method->save();
        $this->close();
    }
}
