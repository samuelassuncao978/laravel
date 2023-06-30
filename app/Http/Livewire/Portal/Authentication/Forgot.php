<?php

namespace App\Http\Livewire\Portal\Authentication;

// Illuminate
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Livewire\Component;

// Models
use App\Models\Client;

// Traits
use App\Traits\Livewire\Modal;

// Notifications
use App\Notifications\Clients\Authentication\PasswordResetNotification;

class Forgot extends Component
{
    public $email;

    public $rules = [
        "email" => "required|email",
    ];

    public function render()
    {
        return view("pages.portal.authentication.forgot")->layout("segments.organization.login-layout");
    }

    public function save()
    {
        $this->validate();

        if ($client = Client::where(["email" => $this->email])->first()) {
            $expires = now()
                ->add(24, "hours")
                ->toISOString();
            $payload = [
                "token" => Hash::make(md5($expires . optional($client)->id . optional($client)->email . optional($client)->password)),
                "expires" => $expires,
                "identity" => optional($client)->id,
            ];

            $client->notify(new PasswordResetNotification(base64_encode(json_encode($payload))));
        }

        return redirect("/portal");
    }
}
