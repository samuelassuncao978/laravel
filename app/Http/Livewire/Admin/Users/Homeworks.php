<?php

namespace App\Http\Livewire\Admin\Users;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\User;
use App\Models\Homework;

// Traits
use App\Traits\Livewire\Groupable;
use App\Traits\Livewire\Searchable;
use App\Traits\Livewire\Paginatable;

class Homeworks extends Component
{
    use Paginatable, Groupable, Searchable;

    public User $user;

    public function render()
    {
        $homeworks = Homework::owned();
        return view("pages.admin.users.homework", [
            "homeworks" => $homeworks->paginate($this->rows),
        ]);
    }
}
