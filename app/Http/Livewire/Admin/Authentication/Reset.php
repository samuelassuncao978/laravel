<?php

namespace App\Http\Livewire\Admin\Authentication;

// Illuminate
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Http\Livewire\Component;

// Models
use App\Models\User;

// Traits
use App\Traits\Livewire\Modal;

class Reset extends Component
{
    public ?User $user;
    public $expires;

    public $password;
    public $password_confirmation;

    public $rules = [
        "password" => "required|confirmed",
        "password_confirmation" => "required",
    ];

    public function mount($token)
    {
        $payload = json_decode(base64_decode($token));
        $this->user = User::find(optional($payload)->identity);
        $this->expires = new Carbon(optional($payload)->expires);
        if (Hash::check(md5(optional($payload)->expires . optional($this->user)->id . optional($this->user)->email . optional($this->user)->password), optional($payload)->token) === false) {
            $this->user = null;
            $this->expires = null;
        }
    }

    public function render()
    {
        return view("pages.admin.authentication.reset")->layout("components.container");
    }

    public function save()
    {
        $this->validate();
        $this->user->password = Hash::make($this->password);
        $this->user->save();
        Auth::guard("admin")->login($this->user);
        return redirect("/admin");
    }
}
