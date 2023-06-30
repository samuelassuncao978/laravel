<?php

namespace App\Http\Livewire\Admin\Files;

// Illuminate
use Illuminate\Support\Facades\Storage;

use App\Http\Livewire\Component;

// Models
use App\Models\File;

// Traits
use App\Traits\Livewire\Modal;

class View extends Component
{
    use Modal;

    public File $file;

    public function render()
    {
        return view("segments.admin.files.view");
    }
}
