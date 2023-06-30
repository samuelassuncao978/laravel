<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

// Models

class UserVoucher extends Model
{
    protected $table = "user_vouchers";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
