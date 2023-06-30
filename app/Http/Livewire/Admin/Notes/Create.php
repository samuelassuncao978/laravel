<?php

namespace App\Http\Livewire\Admin\Notes;

// Illuminate
use Illuminate\Support\Facades\Storage;

use App\Http\Livewire\Component;

// Models
use App\Models\Note;
use App\Models\Client;

// Traits
use App\Traits\Livewire\Modal;

class Create extends Component
{
    use Modal;

    public Note $note;
    public ?Client $client = null;
    public ?Appointment $appointment = null;

    public $rules = [];

    public function mount()
    {
        $this->note = new Note();
    }

    public function render()
    {
        return view("segments.admin.notes.create");
    }

    public function save()
    {
        // $this->validate();

        $this->note->save();
        if ($this->client) {
            $this->note->clients()->sync($this->client);
        }
        if ($this->appointment) {
            $this->note->appointments()->sync($this->appointment);
        }
        $this->note->users()->sync(
            auth()
                ->guard("admin")
                ->user()
        );
        $this->close();
    }
}
