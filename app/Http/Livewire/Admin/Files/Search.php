<?php

namespace App\Http\Livewire\Admin\Files;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\Folder;
use App\Models\File;

class Search extends Component
{
    public $parent;
    public $search;

    public function render()
    {
        if ($this->parent) {
            $folders = Folder::owned()->where("parent", optional($this->parent)->id);
            $files = File::owned()->whereHas("folders", function ($q) {
                $q->where("id", optional($this->parent)->id);
            });
        } else {
            $folders = Folder::owned()->where("name", "like", "%" . $this->search . "%"); //->where('parent',optional($this->parent)->id);
            $files = File::owned()
                ->where("name", "like", "%" . $this->search . "%")
                ->whereDoesntHave("users.homework");
        }

        return view("pages.admin.files.search", [
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
