<?php

namespace App\Http\Livewire\Admin\Users;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\User;

// Traits
use App\Traits\Livewire\Modal;

class ChangePassword extends Component
{
    use Modal;

    public User $user;

    public $rules = [
        "user.password" => "string",
    ];

    public function render()
    {
        return view("segments.admin.users.change-password");
    }

    public function save()
    {
        $this->user->save();
        $this->close();
    }
}
