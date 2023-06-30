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

class Files extends Component
{
    use Paginatable, Groupable, Searchable;

    public Client $client;

    public function render()
    {
        $files = $this->client->files()->owned();

        if (!empty($this->search)) {
            $files->where("name", "like", "%$this->search%");
        }

        if (!empty($this->group_by)) {
            if ($this->group_by === "type") {
                $files->orderBy("mime");
            } elseif ($this->group_by === "sharing") {
                $files->whereHas("clients", function ($q) {
                    $q->where("id", auth()->user()->id);
                });
            }
        }

        return view("pages.admin.clients.files", [
            "files" => $files->paginate($this->rows),
        ]);
    }
}
