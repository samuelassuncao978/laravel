<?php

namespace App\Http\Livewire\Admin\Files;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\Tag;

class Tagged extends Component
{
    public Tag $tag;

    public function render()
    {
        $files = $this->tag->files;
        $folders = $this->tag->folders;

        return view("pages.admin.files.tagged", [
            "folders" => $folders,
            "files" => $files,
            "parent" => null,
        ]);
    }
}
