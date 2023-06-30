<?php

namespace App\Http\Livewire\Admin\Folders;

use App\Http\Livewire\Component;

// Models
use App\Models\Folder;

// Traits
use App\Traits\Livewire\Modal;

class Edit extends Component
{
    use Modal;

    public Folder $folder;

    public $rules = [
        "folder.name" => "string",
        "folder.icon" => "string",
    ];

    public function render()
    {
        return view("segments.admin.folders.edit");
    }

    public function save()
    {
        $this->folder->save();
        $this->close();
    }
}
