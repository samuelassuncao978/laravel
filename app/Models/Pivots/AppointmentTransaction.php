<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

// Models

class AppointmentTransaction extends Model
{
    protected $table = "appointment_transactions";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
