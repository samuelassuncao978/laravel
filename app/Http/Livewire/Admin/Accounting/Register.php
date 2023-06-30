<?php

namespace App\Http\Livewire\Admin\Accounting;

use App\Http\Livewire\Component;

// Models
use App\Models\User;

// Traits
use App\Traits\Livewire\Modal;
use App\Traits\Livewire\Wizard;
use App\Traits\Livewire\Stepable;

class Register extends Component
{
    use Modal, Wizard, Stepable;

    public User $user;

    public $rules = [
        "user.first_name" => "string",
        "user.last_name" => "string",
        "user.phone" => "array|required",
        "user.phone.number" => "string|required",
        "user.phone.country" => "string|required",
        "user.email" => "email",
        "user.address" => "array",
        "user.date_of_birth" => "date",
    ];

    public function mount($user)
    {
        $this->user = $user;

        $this->_steps = [
            "begin" => "active",
            "details" => null,
            "identification" => null,
            "account" => null,
            "confirm" => null,
        ];
    }

    public function render()
    {
        return view("segments.admin.accounting.register");
    }

    public function saveAndNext()
    {
        if ($this->steps()->current === "details") {
            //   dd($this->user);
            $this->validate();
            $this->user->save();
        }

        $this->steps()->next();
    }

    public function save()
    {
        $this->close();
    }
}
