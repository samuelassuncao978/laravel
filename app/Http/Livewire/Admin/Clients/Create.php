<?php

namespace App\Http\Livewire\Admin\Clients;

// Illuminate
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Livewire\Component;

// Models
use App\Models\Client;

// Traits
use App\Traits\Livewire\Modal;

class Create extends Component
{
    use Modal;

    public Client $client;

    public $suggested = null;

    public $rules = [
        "client.first_name" => "required",
        "client.last_name" => "required",
        "client.email" => "required",
        "client.phone" => "required|phone",
    ];

    public function mount()
    {
        $this->client = new Client();
        $this->client->phone = ["country" => "AU", "number" => ""];
    }

    public function render()
    {
        return view("segments.admin.clients.create");
    }

    public function updated()
    {
        $this->suggested = null;
        if (!empty($this->client->first_name) && strlen($this->client->first_name) > 3 && !empty($this->client->last_name) && strlen($this->client->last_name) > 3) {
            $clients = new Client();
            $clients = $clients->where([["first_name", "like", "%" . $this->client->first_name . "%"], ["last_name", "like", "%" . $this->client->last_name . "%"]]);

            $this->suggested = $clients->first();
        }
        if (!empty(optional($this->client->phone)["number"]) && strlen(optional($this->client->phone)["number"]) > 7) {
            $clients = new Client();
            $clients = $clients->where([["phone->number", "like", "%" . optional($this->client->phone)["number"] . "%"]]);

            if ($suggested = $clients->first()) {
                $this->suggested = $suggested ? $suggested : $this->suggested;
            }
        }
        if (!empty($this->client->email) && strlen($this->client->email) > 10) {
            $clients = new Client();
            $clients = $clients->where([["email", "like", "%" . $this->client->email . "%"]]);

            if ($suggested = $clients->first()) {
                $this->suggested = $suggested ? $suggested : $this->suggested;
            }
        }
    }

    public function use()
    {
        $this->suggested->users()->syncWithoutDetaching(auth()->user()->id);
        $this->close();
        return redirect("/admin/clients/" . $this->suggested->id);
    }

    public function save()
    {
        $this->validate();
        $this->authorize("create", $this->client);
        $this->client->save();
        $this->client->users()->syncWithoutDetaching(auth()->user()->id);
        $this->close();
        return redirect("/admin/clients/" . $this->client->id);
    }
}
