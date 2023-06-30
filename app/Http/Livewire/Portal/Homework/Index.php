<?php

namespace App\Http\Livewire\Portal\Homework;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\Client;

// Traits
use App\Traits\Livewire\Groupable;
use App\Traits\Livewire\Searchable;
use App\Traits\Livewire\Paginatable;

class Index extends Component
{
    use Paginatable, Groupable, Searchable;

    public Client $client;

    public function mount(Request $request)
    {
        $this->client = Client::first();
    }

    public function render()
    {
        $homework = $this->client->homework();

        return view("pages.portal.homework.index", [
            "homeworks" => $homework->paginate($this->rows),
        ])->layout("layouts.portal");
    }
}
