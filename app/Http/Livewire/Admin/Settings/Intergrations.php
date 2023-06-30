<?php

namespace App\Http\Livewire\Admin\Settings;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\Intergration;

// Traits
use App\Traits\Livewire\Groupable;
use App\Traits\Livewire\Searchable;
use App\Traits\Livewire\Paginatable;

class Intergrations extends Component
{
    use Paginatable, Groupable, Searchable;

    public function mount()
    {
        $this->authorize("view-any", Intergration::class);
    }

    public function render()
    {
        $intergrations = new Intergration();

        if (!empty($this->search)) {
            $intergrations = $intergrations->where("manifest", "like", "%$this->search%");
        }

        return view("pages.admin.settings.intergrations", [
            "intergrations" => $intergrations->withheld()->paginate($this->rows),
        ]);
    }
}
