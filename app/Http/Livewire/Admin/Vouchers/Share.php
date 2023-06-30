<?php

namespace App\Http\Livewire\Admin\Vouchers;

use App\Http\Livewire\Component;

// Models
use App\Models\Voucher;

// Traits
use App\Traits\Livewire\Modal;

class Share extends Component
{
    use Modal;

    public Voucher $voucher;

    public $rules = [];

    public function render()
    {
        return view("segments.admin.vouchers.share");
    }

    public function qrcode($format = "svg")
    {
        return \SimpleSoftwareIO\QrCode\Facades\QrCode::size(100)
            ->format($format)
            ->generate(url("/"));
    }

    public function download()
    {
        return response()->streamDownload(function () {
            echo $this->qrcode("png");
        }, "voucher-" . $this->voucher->code . ".png");
    }
}
