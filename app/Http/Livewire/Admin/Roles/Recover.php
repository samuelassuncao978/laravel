<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Http\Livewire\Component;
use Illuminate\Http\Request;
use App\Traits\Livewire\Modal;

// Models
use App\Models\Role;

class Recover extends Component
{
    use Modal;

    public Role $role;

    public $rules = [];

    public function render()
    {
        return view("segments.admin.roles.recover");
    }

    public function save()
    {
        $this->authorize("restore", $this->role);

        $this->role->restore();
        $this->close();
    }
}
