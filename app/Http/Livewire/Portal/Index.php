<?php

namespace App\Http\Livewire\Portal;

use App\Http\Livewire\Component;

use Illuminate\Http\Request;

use App\Traits\Livewire\Groupable;
use App\Traits\Livewire\Searchable;
use App\Traits\Livewire\Paginatable;

// Models
use App\Models\Client;

class Index extends Component
{
    public Client $client;

    public function mount(Request $request)
    {
    }

    public function render()
    {
        return view("pages.portal.livewire")->layout("layouts.portal");
    }
}
