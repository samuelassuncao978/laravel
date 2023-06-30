<?php

namespace App\Http\Livewire\Admin\AppointmentTypes;

use App\Http\Livewire\Component;
use Illuminate\Http\Request;
use App\Traits\Livewire\Modal;
use App\Traits\Livewire\Paginatable;

// Models
use App\Models\AppointmentType;
use App\Models\AppointmentMethod;

class Methods extends Component
{
    use Modal, Paginatable;

    public AppointmentType $appointment_type;

    public $selected = [];

    public $methods;

    public function mount()
    {
        $this->methods = AppointmentMethod::all();
        $this->selected = $this->appointment_type->appointment_methods->pluck("id")->toArray();
    }

    public function render()
    {
        return view("segments.admin.appointment_types.methods");
    }

    public function save()
    {
        $this->authorize("attach-methods", $this->appointment_type);

        $this->appointment_type->appointment_methods()->sync($this->selected);
        $this->close();
    }
}
