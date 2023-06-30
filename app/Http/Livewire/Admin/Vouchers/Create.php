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

class Create extends Component
{
    use Modal;

    public ?User $user;
    public Voucher $voucher;

    public $rules = [
        "voucher.name" => "string|required",
        "voucher.type" => "string|required",
        "voucher.eligibility" => "string|required",
        "voucher.amount" => "number|required",
        "voucher.start_at" => "date",
        "voucher.end_at" => "date",
        "voucher.limit" => "number|required",
    ];

    public function mount()
    {
        $this->voucher = new Voucher();
        $this->voucher->type = "fixed";
        $this->voucher->eligibility = "unrestricted";
        $this->voucher->limit = 0;
    }

    public function render()
    {
        return view("segments.admin.vouchers.create");
    }

    public function save()
    {
        $this->authorize("create", $this->voucher);

        $this->voucher->save();
        if ($this->user) {
            $this->voucher->users()->attach($this->user->id);
        }
        $this->close();
    }
}
