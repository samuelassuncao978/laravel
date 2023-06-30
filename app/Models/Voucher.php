<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

// Models
use App\Models\User;
use App\Models\Appointment;

// Pivots
use App\Models\Pivots\UserVoucher;
use App\Models\Pivots\AppointmentVoucher;

// Traits
use App\Traits\UsesUuid;
use App\Traits\ScopeOwned;
use App\Traits\ScopeWithheld;

class Voucher extends Model
{
    use UsesUuid, SoftDeletes, ScopeOwned, ScopeWithheld;

    protected $table = "vouchers";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = ["name", "code", "type", "eligibility", "amount", "currency", "limit", "start_at", "end_at"];

    protected $casts = [];

    protected static function booted()
    {
        parent::boot();
        static::creating(function ($model) {
            if (!optional($model)->id) {
                $model->id = (string) Str::uuid();
            }
            if (!optional($model)->code) {
                $digits = 8;
                $model->code = (string) rand(pow(10, $digits - 1), pow(10, $digits) - 1);
            }
        });
    }

    // Relationships
    public function users()
    {
        return $this->belongsToMany(User::class, UserVoucher::class);
    }

    public function appointments()
    {
        return $this->belongsToMany(Appointment::class, AppointmentVoucher::class);
    }
}
