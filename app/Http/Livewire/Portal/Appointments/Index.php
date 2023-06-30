<?php

namespace App\Http\Livewire\Portal\Appointments;

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
        $this->client = auth()
            ->guard("client")
            ->user();
    }

    public function render()
    {
        $next = $this->client
            ->appointments()
            ->next()
            ->first();
        $upcoming = $this->client
            ->appointments()
            ->upcoming()
            ->exclude(optional($next)->id)
            ->get();
        $appointments = $this->client->appointments();

        return view("pages.portal.appointments.index", [
            "next" => $next,
            "upcoming" => $upcoming,
            "appointments" => $appointments->paginate($this->rows),
        ])->layout("layouts.portal");
    }
}
