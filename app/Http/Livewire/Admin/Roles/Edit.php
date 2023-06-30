<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Http\Livewire\Component;
use Illuminate\Http\Request;
use App\Traits\Livewire\Modal;

// Models
use App\Models\Role;

class Edit extends Component
{
    use Modal;

    public Role $role;

    public $rules = [
        "role.name" => "string|required",
    ];

    public function render()
    {
        return view("segments.admin.roles.edit");
    }

    public function save()
    {
        $this->validate();
        $this->authorize("update", $this->role);

        $this->role->save();
        $this->close();
    }
}
