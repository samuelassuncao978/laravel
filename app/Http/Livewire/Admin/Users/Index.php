<?php

namespace App\Http\Livewire\Admin\Users;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\User;

// Traits
use App\Traits\Livewire\Groupable;
use App\Traits\Livewire\Searchable;
use App\Traits\Livewire\Paginatable;
use App\Traits\Livewire\Pageable;
use App\Traits\Livewire\Tabable;

class Index extends Component
{
    use Paginatable, Groupable, Searchable, Pageable, Tabable;

    public User $user;

    public function mount(Request $request)
    {
        $this->user = $request->user ?? (User::first() ?? new User());

        $this->pge()->load($this->user->id, ["user" => $this->user]);
        $this->tab()->load("profile", ["user" => $this->user]);
    }

    public function render()
    {
        $users = new User();

        if (!empty($this->search)) {
            $users = $users
                ->where("first_name", "like", "%$this->search%")
                ->orWhere("last_name", "like", "%$this->search%")
                ->orWhere("email", "like", "%$this->search%");
        }

        return view("pages.admin.users.index", [
            "users" => $users->invisible()->paginate($this->rows),
        ])->layout("components.layout");
    }
}
