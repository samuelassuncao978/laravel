<?php

namespace App\Http\Livewire\Portal\Authentication;

// Illuminate
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Http\Livewire\Component;

// Models
use App\Models\Client;
use App\Models\Employer;
use App\Models\EmployerLocation;
use App\Models\Homework;

class Register extends Component
{
    public ?Employer $employer = null;
    public ?EmployerLocation $employerlocation = null;
    public Client $client;

    public $code;
    public $password;

    public $rules = [
        "client.first_name" => "required|string",
        "client.last_name" => "required|string",
        "client.email" => "required|email|unique:clients,email",
        "client.phone" => "required|phone",
        "password" => "required",
    ];

    public function mount()
    {
        if (request()->input("code")) {
            $this->code = request()->input("code");
            $this->check();
        }
        $this->client = new Client();
        $this->client->phone = ["country" => "AU", "number" => ""];
    }

    public function render()
    {
        return view("pages.portal.authentication.register")->layout("segments.organization.login-layout");
    }

    public function save()
    {
        $this->validate();
        $this->client->password = Hash::make($this->password);
        $this->client->save();

        if ($this->employer) {
            $this->client->employers()->sync($this->employer->id);

            $this->client->homework()->sync(Homework::all());
        }
        if ($this->employerlocation) {
            $this->client->locations()->sync($this->employerlocation->id);
        }
        Auth::guard("client")->login($this->client);

        return redirect("/portal");
    }

    public function check()
    {
        $this->employerlocation = EmployerLocation::find($this->code);
        if ($this->employerlocation) {
            $this->employer = Employer::find($this->employerlocation->employer->id);
        }
    }
}
