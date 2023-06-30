<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

// Models

class UserAppointmentType extends Model
{
    protected $table = "users_appointment_types";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
