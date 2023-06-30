<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Models
use App\Models\User;
use App\Models\AppointmentType;

// Pivots
use App\Models\Pivots\UserAppointmentMethod;
use App\Models\Pivots\AppointmentTypeAppointmentMethod;

// Traits
use App\Traits\UsesUuid;
use App\Traits\ScopeWithheld;

class AppointmentMethod extends Model
{
    use HasFactory, UsesUuid, SoftDeletes, ScopeWithheld;

    protected $table = "appointment_methods";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = ["name", "icon", "charge"];

    // Relationships

    public function appointments()
    {
        return $this->belongsToMany(Appointment::class, "method");
    }

    public function users()
    {
        return $this->belongsToMany(User::class, UserAppointmentMethod::class);
    }

    public function appointment_types()
    {
        return $this->belongsToMany(AppointmentType::class, AppointmentTypeAppointmentMethod::class);
    }
}
