<?php

namespace App\Policies;

use App\Models\Voucher;
use App\Models\User;
use App\Models\Intergration;
use Illuminate\Auth\Access\HandlesAuthorization;

class VoucherPolicy
{
    use HandlesAuthorization;

    public function viewAny($consumer)
    {
        //
        return true;
    }

    public function view($consumer, Voucher $voucher)
    {
        //
        return true;
    }

    public function create($consumer)
    {
        //
        return true;
    }

    public function update($consumer, Voucher $voucher)
    {
        //
        return true;
    }

    public function delete($consumer, Voucher $voucher)
    {
        //
        return true;
    }

    public function restore($consumer, Voucher $voucher)
    {
        //
        return true;
    }

    public function forceDelete($consumer, Voucher $voucher)
    {
        //
        return true;
    }
}
