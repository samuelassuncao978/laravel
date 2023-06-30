<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Http\Livewire\Component;

use Illuminate\Http\Request;

use App\Traits\Livewire\Groupable;
use App\Traits\Livewire\Searchable;
use App\Traits\Livewire\Paginatable;

// Models
use App\Models\Role;

class Roles extends Component
{
    use Paginatable, Groupable, Searchable;

    public function mount()
    {
        $this->authorize("view-any", Role::class);
    }

    public function render()
    {
        $roles = new Role();

        if (!empty($this->search)) {
            $roles = $roles->where("name", "like", "%$this->search%");
        }

        return view("pages.admin.settings.roles", [
            "roles" => $roles
                ->withheld()
                ->invisible()
                ->paginate($this->rows),
        ]);
    }
}
