<?php

namespace App\Http\Livewire\Admin\AppointmentTypes;

use App\Http\Livewire\Component;
use Illuminate\Http\Request;
use App\Traits\Livewire\Modal;

// Models
use App\Models\AppointmentType;

class Delete extends Component
{
    use Modal;

    public AppointmentType $appointment_type;

    public $rules = [];

    public function render()
    {
        return view("segments.admin.appointment_types.delete");
    }

    public function save()
    {
        $this->authorize("delete", $this->appointment_type);

        $this->appointment_type->delete();
        $this->close();
    }
}
