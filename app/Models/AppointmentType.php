<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Models
use App\Models\User;
use App\Models\AppointmentMethod;

// Pivots
use App\Models\Pivots\UserAppointmentType;
use App\Models\Pivots\AppointmentTypeAppointmentMethod;

// Traits
use App\Traits\UsesUuid;
use App\Traits\ScopeOwned;
use App\Traits\ScopeWithheld;

class AppointmentType extends Model
{
    use HasFactory, UsesUuid, SoftDeletes, ScopeOwned, ScopeWithheld;

    protected $table = "appointment_types";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = ["name", "icon", "duration", "charge"];

    // Relationships

    public function cost()
    {
        return optional($this->pivot)->charge ?? $this->charge;
    }

    public function appointments()
    {
        return $this->belongsToMany(Appointment::class, "type");
    }

    public function users()
    {
        return $this->belongsToMany(User::class, UserAppointmentType::class);
    }

    public function appointment_methods()
    {
        return $this->belongsToMany(AppointmentMethod::class, AppointmentTypeAppointmentMethod::class);
    }
}
