<?php

namespace App\Http\Livewire\Admin\Users;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\User;
use App\Models\Voucher;

// Traits
use App\Traits\Livewire\Groupable;
use App\Traits\Livewire\Searchable;
use App\Traits\Livewire\Paginatable;

class Vouchers extends Component
{
    use Paginatable, Groupable, Searchable;

    public User $user;

    public function render()
    {
        $vouchers = Voucher::owned();
        return view("pages.admin.users.vouchers", [
            "vouchers" => $vouchers->paginate($this->rows),
        ]);
    }
}
