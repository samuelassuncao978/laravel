<?php

namespace App\Http\Livewire\Admin\Files;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\Client;

class ClientFiles extends Component
{
    public ?Client $client = null;

    public function render()
    {
        $clients = auth()
            ->user()
            ->clients()
            ->whereHas("files.users", function ($q) {
                $q->where("id", auth()->user()->id);
            });

        if ($this->client) {
            $files = $this->client->files()->owned();
        } else {
            $files = null;
        }

        return view("pages.admin.files.client-files", [
            "clients" => $clients->get(),
            "files" => optional($files)->get() ?? [],
            "current" => null,
        ]);
    }

    public function load($client_id = null)
    {
        $this->client = Client::find($client_id);
    }

    public function reload()
    {
        $this->reset();
    }
}
