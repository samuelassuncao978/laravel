<?php

namespace App\Http\Livewire\Admin\Homework;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\Homework;
use App\Models\Client;
use App\Models\User;

// Traits
use App\Traits\Livewire\Modal;
use App\Traits\Livewire\Paginatable;

class Assign extends Component
{
    use Modal, Paginatable;

    public ?User $user = null;
    public Homework $homework;

    public $selected = [];

    public function mount()
    {
        $this->selected = $this->homework->clients->pluck("id")->toArray();
    }

    public function render()
    {
        $clients = new Client();

        return view("segments.admin.homework.assign", [
            "clients" => $clients->all(),
        ]);
    }

    public function save()
    {
        $this->homework->clients()->sync($this->selected);
        $this->close();
    }
}
