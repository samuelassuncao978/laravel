<?php

namespace App\Http\Livewire\Admin\Users;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\User;

// Traits
use App\Traits\Livewire\Modal;

class Create extends Component
{
    use Modal;

    public User $user;

    public $rules = [
        "user.first_name" => "string|required",
        "user.last_name" => "string|required",
        "user.email" => "required|email|unique:users,email",
        "user.phone" => "required|phone",
        "user.address" => "required|address",
    ];

    public function mount()
    {
        $this->user = new User();
    }

    public function render()
    {
        return view("segments.admin.users.create");
    }

    public function save()
    {
        $this->validate();
        $this->user->save();
        $this->close();
    }
}
