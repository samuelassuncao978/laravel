<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

// Models

class AppointmentVoucher extends Model
{
    protected $table = "appointment_vouchers";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
