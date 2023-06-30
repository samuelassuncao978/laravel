<?php

namespace App\Http\Livewire\Admin\Tenants;

use App\Http\Livewire\Component;

// Models
use App\Models\System\Tenant;

// Traits
use App\Traits\Livewire\Groupable;
use App\Traits\Livewire\Searchable;
use App\Traits\Livewire\Paginatable;

class Invoices extends Component
{
    use Paginatable, Groupable, Searchable;

    public Tenant $tenant;

    public function render()
    {
        $invoices = $this->tenant->invoices();
        return view("pages.admin.tenants.invoices", [
            "invoices" => $invoices->paginate($this->rows),
        ]);
    }
}
