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

class Notes extends Component
{
    use Paginatable, Groupable, Searchable;

    public Client $client;

    public function render()
    {
        $notes = $this->client->notes();

        if (!empty($this->search)) {
            $notes->where("note", "like", "%$this->search%");
        }

        return view("pages.admin.clients.notes", [
            "notes" => $notes
                ->withheld()
                ->owned()
                ->paginate($this->rows),
        ]);
    }
}
