<?php

namespace App\Http\Livewire\Admin\Vouchers;

use App\Http\Livewire\Component;
use Illuminate\Http\Request;
use App\Traits\Livewire\Modal;

// Models
use App\Models\Voucher;

class Recover extends Component
{
    use Modal;

    public Voucher $voucher;

    public $rules = [];

    public function render()
    {
        return view("segments.admin.vouchers.recover");
    }

    public function save()
    {
        $this->authorize("restore", $this->voucher);

        $this->voucher->restore();
        $this->close();
    }
}
