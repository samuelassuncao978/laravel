<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

// Models

class AppointmentFile extends Model
{
    protected $table = "appointments_files";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
