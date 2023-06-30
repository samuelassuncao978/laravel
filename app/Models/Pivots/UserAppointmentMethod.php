<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

// Models

class UserAppointmentMethod extends Model
{
    protected $table = "users_appointment_methods";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
