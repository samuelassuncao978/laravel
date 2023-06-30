<?php

namespace App\Http\Livewire\Admin\Notes;

use App\Http\Livewire\Component;
use Illuminate\Http\Request;
use App\Traits\Livewire\Modal;

// Models
use App\Models\Note;

class Recover extends Component
{
    use Modal;

    public Note $note;

    public function render()
    {
        return view("segments.admin.notes.recover");
    }

    public function save()
    {
        $this->authorize("restore", $this->note);

        $this->note->restore();
        $this->close();
    }
}
