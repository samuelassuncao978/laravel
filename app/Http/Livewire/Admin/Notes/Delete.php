<?php

namespace App\Http\Livewire\Admin\Notes;

use App\Http\Livewire\Component;
use Illuminate\Http\Request;
use App\Traits\Livewire\Modal;

// Models
use App\Models\Note;

class Delete extends Component
{
    use Modal;

    public Note $note;

    public function render()
    {
        return view("segments.admin.notes.delete");
    }

    public function save()
    {
        $this->authorize("delete", $this->note);

        $this->note->delete();
        $this->close();
    }
}
