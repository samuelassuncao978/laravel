<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Http\Livewire\Component;
use Illuminate\Http\Request;
use App\Traits\Livewire\Modal;
use App\Traits\Livewire\Paginatable;

// Models
use App\Models\Role;
use App\Models\User;

class Users extends Component
{
    use Modal, Paginatable;

    public Role $role;

    public $selected = [];

    public $users;

    public function mount()
    {
        $this->users = User::all();
        $this->selected = $this->role->users->pluck("id")->toArray();
    }

    public function render()
    {
        return view("segments.admin.roles.users");
    }

    public function save()
    {
        $this->authorize("attach-users", $this->role);

        $this->role->users()->sync($this->selected);
        $this->close();
    }
}
