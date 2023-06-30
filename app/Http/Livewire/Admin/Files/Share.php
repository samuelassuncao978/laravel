<?php

namespace App\Http\Livewire\Admin\Files;

use App\Http\Livewire\Component;

// Models
use App\Models\File;
use App\Models\Client;
use App\Models\User;

// Traits
use App\Traits\Livewire\Modal;

class Share extends Component
{
    use Modal;

    public File $file;

    public $type = "clients";
    public $selected = [];

    public $rules = [];

    // public function mount(){
    //     $this->selected = $this->homework->clients->pluck('id')->toArray();
    // }

    public function render()
    {
        $clients = Client::owned();
        $users = new User();

        return view("segments.admin.files.share", [
            "with" => $this->type === "clients" ? $clients->get() : $users->get(),
        ]);
    }

    public function save()
    {
        $this->close();
    }
}
