<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

class AppointmentTypeAppointmentMethod extends Model
{
    protected $table = "appointment_types_appointment_methods";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
