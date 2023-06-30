<?php

namespace App\Http\Livewire\Admin\Notes;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\Note;

// Traits
use App\Traits\Livewire\Modal;

class ChangeProtection extends Component
{
    use Modal;

    public Note $note;

    public $rules = [
        "note.protection" => "string",
    ];

    public function render()
    {
        return view("segments.admin.notes.change-protection");
    }

    public function save()
    {
        $this->note->save();
        $this->close();
    }
}
