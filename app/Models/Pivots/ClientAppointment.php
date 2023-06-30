<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

// Models

class ClientAppointment extends Model
{
    protected $table = "clients_appointments";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
