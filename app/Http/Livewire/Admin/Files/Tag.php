<?php

namespace App\Http\Livewire\Admin\Files;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\File;

// Traits
use App\Traits\Livewire\Modal;

class Tag extends Component
{
    use Modal;

    public File $file;

    public $tag;

    public $rules = [];

    public function mount()
    {
        $this->tag = optional($this->file->tags()->first())->id;
    }

    public function render()
    {
        return view("segments.admin.files.tag");
    }

    public function save()
    {
        $this->file->save();
        $this->file->tags()->sync($this->tag);
        $this->close();
    }
}
