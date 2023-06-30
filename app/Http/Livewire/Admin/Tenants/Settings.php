<?php

namespace App\Http\Livewire\Admin\Tenants;

use App\Http\Livewire\Component;

// Models
use App\Models\System\Tenant;

// Traits
use App\Traits\Livewire\Groupable;
use App\Traits\Livewire\Searchable;
use App\Traits\Livewire\Paginatable;

class Settings extends Component
{
    use Paginatable, Groupable, Searchable;

    public Tenant $tenant;

    public function render()
    {
        $settings = $this->tenant->settings();
        return view("pages.admin.tenants.settings", [
            "settings" => $settings->paginate($this->rows),
        ]);
    }
}
