<?php

namespace App\Http\Livewire\Admin\Invoices;

use App\Http\Livewire\Component;

// Models
use App\Models\System\Invoice;

// Traits
use App\Traits\Livewire\Modal;

class View extends Component
{
    use Modal;

    public Invoice $invoice;

    public $rules = [];

    public function render()
    {
        return view("segments.admin.invoices.view");
    }

    public function save()
    {
        $this->close();
    }
}
