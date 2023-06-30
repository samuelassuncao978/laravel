<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

// Models

class UserAppointment extends Model
{
    protected $table = "users_appointments";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
