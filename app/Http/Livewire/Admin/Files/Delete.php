<?php

namespace App\Http\Livewire\Admin\Files;

use App\Http\Livewire\Component;

// Models
use App\Models\File;

// Traits
use App\Traits\Livewire\Modal;

class Delete extends Component
{
    use Modal;

    public File $file;

    public $rules = [];

    public function render()
    {
        return view("segments.admin.files.delete");
    }

    public function save()
    {
        $this->file->delete();
        $this->close();
    }
}
