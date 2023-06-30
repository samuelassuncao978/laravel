<?php

namespace App\Http\Livewire\Portal\Authentication;

// Illuminate
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Http\Livewire\Component;

// Models
use App\Models\Client;

// Traits
use App\Traits\Livewire\Modal;

class Reset extends Component
{
    public ?Client $client;
    public $expires;

    public $password;

    public $rules = [
        "password" => "required",
    ];

    public function mount()
    {
        $payload = json_decode(base64_decode(request()->input("token")));
        $this->client = Client::find(optional($payload)->identity);
        $this->expires = new Carbon(optional($payload)->expires);
        if (Hash::check(md5(optional($payload)->expires . optional($this->client)->id . optional($this->client)->email . optional($this->client)->password), optional($payload)->token) === false) {
            $this->client = null;
            $this->expires = null;
        }
    }

    public function render()
    {
        return view("pages.portal.authentication.reset")->layout("segments.organization.login-layout");
    }

    public function save()
    {
        $this->validate();
        $this->client->password = Hash::make($this->password);
        $this->client->save();
        Auth::guard("client")->login($this->client);
        return redirect("/portal");
    }
}
