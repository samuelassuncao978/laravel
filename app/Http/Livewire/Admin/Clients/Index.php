<?php

namespace App\Http\Livewire\Admin\Clients;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\Client;

// Traits
use App\Traits\Livewire\Groupable;
use App\Traits\Livewire\Searchable;
use App\Traits\Livewire\Paginatable;
use App\Traits\Livewire\Pageable;
use App\Traits\Livewire\Tabable;

class Index extends Component
{
    use Paginatable, Pageable, Tabable, Groupable, Searchable;

    public Client $client;

    public function mount(Request $request)
    {
        $this->client = $request->client ?? (Client::owned()->first() ?? new Client());

        $this->pge()->load($this->client->id, ["client" => $this->client]);
        $this->tab()->load("profile", ["client" => $this->client]);
    }

    public function render()
    {
        $clients = Client::owned();

        if (!empty($this->search)) {
            $clients = $clients
                ->where("first_name", "like", "%$this->search%")
                ->orWhere("last_name", "like", "%$this->search%")
                ->orWhere("email", "like", "%$this->search%");
        }

        return view("pages.admin.clients.index", [
            "clients" => $clients->paginate($this->rows),
        ])->layout("components.layout");
    }
}
