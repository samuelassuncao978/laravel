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

class Appointments extends Component
{
    use Paginatable, Groupable, Searchable;

    public Client $client;

    public function render()
    {
        $appointments = $this->client->appointments()->owned();

        if (!empty($this->search)) {
            $appointments->where("start_at", "like", "%$this->search%");
            $appointments->orWhere("end_at", "like", "%$this->search%");
            $appointments->orWhere("seen_at", "like", "%$this->search%");
            $appointments->orWhere("arrived_at", "like", "%$this->search%");
            $appointments->orWhere("discharged_at", "like", "%$this->search%");
            $appointments->orWhereHas("method", function ($q) {
                $q->where("name", "like", "%$this->search%");
            });
            $appointments->orWhereHas("type", function ($q) {
                $q->where("name", "like", "%$this->search%");
            });
        }

        return view("pages.admin.clients.appointments", [
            "appointments" => $appointments->withheld()->paginate($this->rows),
        ]);
    }
}
