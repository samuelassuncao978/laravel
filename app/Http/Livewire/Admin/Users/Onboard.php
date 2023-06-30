<?php

namespace App\Http\Livewire\Admin\Users;

// Illuminate
use Illuminate\Support\Str;

use App\Http\Livewire\Component;

// Models
use App\Models\User;

// Traits
use App\Traits\Livewire\Modal;
use App\Traits\Livewire\Stepable;

class Onboard extends Component
{
    use Modal, Stepable;

    public User $user;

    public $rules = [
        "user.first_name" => "required",
        "user.last_name" => "required",
        "user.email" => "required|email",
        "user.phone" => "required|phone",
        "user.address" => "required|address",
        "user.gender" => "required",
    ];

    public function mount()
    {
        $this->user = auth()
            ->guard("admin")
            ->user();

        $this->_steps = [
            "welcome" => "active",
            "profile" => null,
            "finish" => null,
        ];
    }

    public function render()
    {
        return view("segments.admin.users.onboard");
    }

    public function next()
    {
        $this->steps()->next();
    }

    public function validateNext()
    {
        $this->validate();
        $this->steps()->next();
    }

    public function prev()
    {
        $this->steps()->prev();
    }

    public function save()
    {
        $this->authorize("onboard", $this->user);

        $this->user->save();
        $this->close();
    }
}
