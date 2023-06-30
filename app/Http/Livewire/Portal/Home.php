<?php

namespace App\Http\Livewire\Portal;

use App\Http\Livewire\Component;

use Illuminate\Http\Request;

use App\Traits\Livewire\Groupable;
use App\Traits\Livewire\Searchable;
use App\Traits\Livewire\Paginatable;

// Models
use App\Models\Client;

class Home extends Component
{
    use Paginatable, Groupable, Searchable;

    public Client $client;

    public function render()
    {
        return view("pages.portal.home");
    }
}
