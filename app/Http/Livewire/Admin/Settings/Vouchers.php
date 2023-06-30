<?php

namespace App\Http\Livewire\Admin\Settings;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\Voucher;

// Traits
use App\Traits\Livewire\Groupable;
use App\Traits\Livewire\Searchable;
use App\Traits\Livewire\Paginatable;

class Vouchers extends Component
{
    use Paginatable, Groupable, Searchable;

    public function mount()
    {
        $this->authorize("view-any", Voucher::class);
    }

    public function render()
    {
        $vouchers = new Voucher();

        if (!empty($this->search)) {
            $vouchers = $vouchers
                ->where("name", "like", "%$this->search%")
                ->orWhere("code", "like", "%$this->search%")
                ->orWhere("amount", "like", "%$this->search%");
        }

        return view("pages.admin.settings.vouchers", [
            "vouchers" => $vouchers
                ->owned()
                ->withheld()
                ->paginate($this->rows),
        ]);
    }
}
