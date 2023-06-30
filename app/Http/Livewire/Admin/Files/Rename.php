<?php

namespace App\Http\Livewire\Admin\Files;

use App\Http\Livewire\Component;

// Models
use App\Models\File;

// Traits
use App\Traits\Livewire\Modal;

class Rename extends Component
{
    use Modal;

    public File $file;

    public $rules = [
        "file.name" => "string",
    ];

    public function render()
    {
        return view("segments.admin.files.rename");
    }

    public function save()
    {
        $this->file->save();
        $this->close();
    }
}
