<?php

namespace App\Http\Livewire\Admin\Files;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\Folder;
use App\Models\File;

class Mine extends Component
{
    public $parent;

    public function render()
    {
        $folders = Folder::owned()->where("parent", optional($this->parent)->id);
        $files = File::owned()->whereDoesntHave("clients"); //->whereDoesntHave('users.homework');

        if ($this->parent) {
            $files = $files->whereHas("folders", function ($q) {
                $q->where("id", optional($this->parent)->id);
            });
        } else {
            $files = $files->whereDoesntHave("folders");
        }

        return view("pages.admin.files.mine", [
            "folders" => $folders->get(),
            "files" => $files->get(),
            "current" => null,
        ]);
    }

    public function load($folder_id = null)
    {
        $this->parent = Folder::find($folder_id);
    }

    public function reload()
    {
        $this->reset();
    }
}
