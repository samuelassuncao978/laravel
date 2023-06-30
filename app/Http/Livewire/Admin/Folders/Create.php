<?php

namespace App\Http\Livewire\Admin\Folders;

use App\Http\Livewire\Component;

// Models
use App\Models\Folder;

// Traits
use App\Traits\Livewire\Modal;

class Create extends Component
{
    use Modal;

    public Folder $folder;

    public $parent;

    public $rules = [
        "folder.name" => "string",
        "folder.icon" => "string",
    ];

    public function mount()
    {
        $this->folder = new Folder();
        $this->folder->icon = "";
    }

    public function render()
    {
        return view("segments.admin.folders.create");
    }

    public function save()
    {
        if ($this->parent) {
            $this->folder->parent = $this->parent->id;
        }
        $this->folder->save();
        $this->folder->users()->sync(auth()->user()->id);

        $this->close();
    }
}
