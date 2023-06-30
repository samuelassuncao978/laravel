<?php

namespace App\Http\Livewire\Admin\Folders;

use App\Http\Livewire\Component;

// Models
use App\Models\Folder;

// Traits
use App\Traits\Livewire\Modal;

class Delete extends Component
{
    use Modal;

    public Folder $folder;

    public $rules = [];

    public function render()
    {
        return view("segments.admin.folders.delete");
    }

    public function save()
    {
        $this->folder->delete();
        $this->close();
    }
}
