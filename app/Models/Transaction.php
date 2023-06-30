<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

// Models
use App\Models\Appointment;

// Pivots
use App\Models\Pivots\AppointmentTransaction;

// Traits
use App\Traits\UsesUuid;

class Transaction extends Model
{
    use UsesUuid, SoftDeletes;

    protected $table = "transactions";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = ["type", "amount", "currency", "card", "expiry", "issuer", "country", "fee"];

    // Relationships
    public function appointments()
    {
        return $this->belongsToMany(Appointment::class, AppointmentTransaction::class);
    }
}
