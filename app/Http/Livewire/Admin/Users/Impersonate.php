<?php

namespace App\Http\Livewire\Admin\Users;

// Illuminate
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

use App\Http\Livewire\Component;

// Models
use App\Models\User;

// Traits
use App\Traits\Livewire\Modal;

class Impersonate extends Component
{
    use Modal;

    public User $user;

    public $rules = [
        "password" => "required",
    ];

    public $password = "";

    public function render()
    {
        return view("segments.admin.users.impersonate");
    }

    public function save()
    {
        $this->authorize("impersonate", $this->user);
        $this->validate();
        if (
            !Auth::guard("admin")->validate([
                "email" => auth()->user()->email,
                "password" => $this->password,
            ])
        ) {
            throw ValidationException::withMessages([
                "password" => __("auth.password"),
            ]);
        }

        session()->put("impersonator", auth()->user()->id);
        Auth::guard("admin")->login($this->user);
        return redirect("/admin");
    }
}
