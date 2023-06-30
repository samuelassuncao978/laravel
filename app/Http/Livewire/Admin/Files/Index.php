<?php

namespace App\Http\Livewire\Admin\Files;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\Folder;
use App\Models\File;

// Traits
use App\Traits\Livewire\Pageable;

class Index extends Component
{
    use Pageable;

    public $search;

    public function mount()
    {
        $this->pge()->load("App\Http\Livewire\Admin\Files\Mine", []);
    }

    public function updatedSearch()
    {
        if (empty($this->search)) {
            $this->mount();
        } else {
            $this->pge()->load("App\Http\Livewire\Admin\Files\Search", [
                "search" => $this->search,
            ]);
        }
    }

    public function render()
    {
        return view("pages.admin.files.index", [
            "file_count" => File::owned()
                ->whereDoesntHave("clients")
                ->whereDoesntHave("users.homework")
                ->count(),
            "client_file_count" => File::owned()
                ->whereHas("clients")
                ->count(),
            "usage" => auth()
                ->user()
                ->storage(),
        ])->layout("components.layout");
    }
}
