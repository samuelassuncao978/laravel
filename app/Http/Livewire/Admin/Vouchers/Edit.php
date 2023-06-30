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

class Edit extends Component
{
    use Modal;

    public Voucher $voucher;

    public $rules = [
        "voucher.name" => "string|required",
        "voucher.type" => "string|required",
        "voucher.eligibility" => "string|required",
        "voucher.amount" => "number|required",
        "voucher.start_at" => "date",
        "voucher.end_at" => "date",
        "voucher.limit" => "number",
        "voucher.limit" => "number|required",
    ];

    public function render()
    {
        return view("segments.admin.vouchers.edit");
    }

    public function save()
    {
        $this->authorize("update", $this->voucher);

        $this->voucher->save();
        $this->close();
    }
}
