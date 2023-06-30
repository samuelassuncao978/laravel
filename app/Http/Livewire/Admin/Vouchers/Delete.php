<?php

namespace App\Http\Livewire\Admin\Vouchers;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\User;
use App\Models\Voucher;

// Traits
use App\Traits\Livewire\Modal;

class Delete extends Component
{
    use Modal;

    public Voucher $voucher;

    public $rules = [];

    public function render()
    {
        return view("segments.admin.vouchers.delete");
    }

    public function save()
    {
        $this->authorize("delete", $this->voucher);

        $this->voucher->delete();
        $this->close();
    }
}
