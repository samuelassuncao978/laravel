<?php

namespace App\Http\Livewire\Admin\Tenants;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\System\Tenant;

// Traits
use App\Traits\Livewire\Groupable;
use App\Traits\Livewire\Searchable;
use App\Traits\Livewire\Paginatable;
use App\Traits\Livewire\Pageable;
use App\Traits\Livewire\Tabable;

class Index extends Component
{
    use Paginatable, Pageable, Tabable, Groupable, Searchable;

    public Tenant $tenant;

    public function mount(Request $request)
    {
        $this->authorize("view-any", Tenant::class);

        $this->tenant = $request->tenant ?? Tenant::first();
        $this->pge()->load($this->tenant->id, ["tenant" => $this->tenant]);
        $this->tab()->load("overview", ["tenant" => $this->tenant]);
    }

    public function render()
    {
        $tenants = new Tenant();

        if (!empty($this->search)) {
            $tenants = $tenants->where("domain", "like", "%$this->search%");
        }

        return view("pages.admin.tenants.index", [
            "tenants" => $tenants->paginate($this->rows),
        ])->layout("components.layout");
    }
}
