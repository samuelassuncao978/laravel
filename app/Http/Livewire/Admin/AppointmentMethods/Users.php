<?php

namespace App\Http\Livewire\Admin\AppointmentMethods;

use App\Http\Livewire\Component;
use Illuminate\Http\Request;
use App\Traits\Livewire\Modal;
use App\Traits\Livewire\Paginatable;

// Models
use App\Models\AppointmentMethod;
use App\Models\User;

class Users extends Component
{
    use Modal, Paginatable;

    public AppointmentMethod $appointment_method;

    public $selected = [];
    public $rules = [];

    public $users;

    public function mount()
    {
        $this->users = User::all();
        $this->selected = $this->appointment_method->users->pluck("id")->toArray();
    }

    public function render()
    {
        return view("segments.admin.appointment_methods.users");
    }

    public function save()
    {
        $this->validate();
        $this->authorize("attach-users", $this->appointment_method);

        $this->appointment_method->users()->sync($this->selected);
        $this->close();
    }
}
