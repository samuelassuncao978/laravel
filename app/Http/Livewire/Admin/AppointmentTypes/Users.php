<?php

namespace App\Http\Livewire\Admin\AppointmentTypes;

use App\Http\Livewire\Component;
use Illuminate\Http\Request;
use App\Traits\Livewire\Modal;
use App\Traits\Livewire\Paginatable;

// Models
use App\Models\AppointmentType;
use App\Models\User;

class Users extends Component
{
    use Modal, Paginatable;

    public AppointmentType $appointment_type;

    public $selected = [];

    public $users;

    public function mount()
    {
        $this->users = User::all();
        $this->selected = $this->appointment_type->users->pluck("id")->toArray();
    }

    public function render()
    {
        return view("segments.admin.appointment_types.users");
    }

    public function save()
    {
        $this->authorize("attach-users", $this->appointment_type);

        $this->appointment_type->users()->sync($this->selected);
        $this->close();
    }
}
