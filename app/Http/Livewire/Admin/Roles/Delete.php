<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Http\Livewire\Component;
use Illuminate\Http\Request;
use App\Traits\Livewire\Modal;

// Models
use App\Models\Role;

class Delete extends Component
{
    use Modal;

    public Role $role;

    public $rules = [];

    public function render()
    {
        return view("segments.admin.roles.delete");
    }

    public function save()
    {
        $this->authorize("delete", $this->role);

        $this->role->delete();
        $this->close();
    }
}
