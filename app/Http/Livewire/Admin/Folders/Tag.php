<?php

namespace App\Http\Livewire\Admin\Folders;

use App\Http\Livewire\Component;

// Models
use App\Models\Folder;

// Traits
use App\Traits\Livewire\Modal;

class Tag extends Component
{
    use Modal;

    public Folder $folder;

    public $tag;

    public $rules = [];

    public function mount()
    {
        $this->tag = optional($this->folder->tags()->first())->id;
    }

    public function render()
    {
        return view("segments.admin.folders.tag");
    }

    public function save()
    {
        $this->folder->save();
        $this->folder->tags()->sync($this->tag);
        $this->close();
    }
}
