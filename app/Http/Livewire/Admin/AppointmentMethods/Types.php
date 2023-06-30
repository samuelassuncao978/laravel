<?php

namespace App\Http\Livewire\Admin\AppointmentMethods;

use App\Http\Livewire\Component;
use Illuminate\Http\Request;
use App\Traits\Livewire\Modal;
use App\Traits\Livewire\Paginatable;

// Models
use App\Models\AppointmentType;
use App\Models\AppointmentMethod;

class Types extends Component
{
    use Modal, Paginatable;

    public AppointmentMethod $appointment_method;

    public $selected = [];
    public $rules = [];

    public $types;

    public function mount()
    {
        $this->types = AppointmentType::all();
        $this->selected = $this->appointment_method->appointment_types->pluck("id")->toArray();
    }

    public function render()
    {
        return view("segments.admin.appointment_methods.types");
    }

    public function save()
    {
        $this->validate();
        $this->authorize("attach-types", $this->appointment_method);

        $this->appointment_method->appointment_types()->sync($this->selected);
        $this->close();
    }
}
