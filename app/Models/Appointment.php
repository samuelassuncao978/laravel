<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Models
use App\Models\User;
use App\Models\Client;
use App\Models\AppointmentMethod;
use App\Models\AppointmentType;
use App\Models\File;
use App\Models\Transaction;
use App\Models\Voucher;

// Pivots
use App\Models\Pivots\UserAppointment;
use App\Models\Pivots\ClientAppointment;
use App\Models\Pivots\AppointmentFile;
use App\Models\Pivots\AppointmentTransaction;
use App\Models\Pivots\AppointmentVoucher;

// Traits
use App\Traits\UsesUuid;
use App\Traits\ScopeOwned;
use App\Traits\ScopeWithheld;

class Appointment extends Model
{
    use UsesUuid, ScopeOwned, SoftDeletes, ScopeWithheld;

    protected $table = "appointments";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = ["type_id", "method_id", "start_at", "end_at", "cancelled_at", "arrived_at", "seen_at", "discharged_at", "payee"];

    protected $casts = [
        "start_at" => \App\Casts\DateTime::class,
        "end_at" => \App\Casts\DateTime::class,
        "cancelled_at" => \App\Casts\DateTime::class,
        "arrived_at" => \App\Casts\DateTime::class,
        "seen_at" => \App\Casts\DateTime::class,
        "discharged_at" => \App\Casts\DateTime::class,
    ];

    protected $hidden = [];

    // Relationships
    public function users()
    {
        return $this->belongsToMany(User::class, UserAppointment::class);
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class, ClientAppointment::class);
    }

    public function files()
    {
        return $this->belongsToMany(File::class, AppointmentFile::class);
    }

    public function method()
    {
        return $this->belongsTo(AppointmentMethod::class)->withTrashed();
    }

    public function type()
    {
        return $this->belongsTo(AppointmentType::class)->withTrashed();
    }

    public function transactions()
    {
        return $this->belongsToMany(Transaction::class, AppointmentTransaction::class);
    }

    public function vouchers()
    {
        return $this->belongsToMany(Voucher::class, AppointmentVoucher::class);
    }

    // Attributes
    public function getDurationAttribute()
    {
        if ($this->start_at && $this->end_at) {
            return $this->start_at->diff($this->end_at)->format("%H:%I");
        }
        return "00:00";
    }

    public function getAmountAttribute()
    {
        $user = $this->users()->first();
        $type = $user
            ->appointment_types()
            ->withTrashed()
            ->where("id", optional($this->type)->id)
            ->first();
        $method = $user
            ->appointment_methods()
            ->withTrashed()
            ->where("id", optional($this->method)->id)
            ->first();

        $charges = [
            "type" => optional(optional($type)->pivot)->amount ?? optional($type)->charge,
            "method" => optional(optional($method)->pivot)->amount ?? optional($method)->charge,
        ];

        return $charges["type"] + $charges["method"];
    }

    public function getPaidAttribute()
    {
        $paid = $this->transactions()->sum("amount");
        return $paid;
    }

    public function getDiscountAttribute()
    {
        if ($this->amount > 0) {
            if ($voucher = $this->vouchers()->first()) {
                if ($voucher->type === "percentage") {
                    $amount = ($this->amount / 100) * $voucher->amount;
                    return $amount;
                } else {
                    if ($this->amount >= $voucher->amount) {
                        return $voucher->amount;
                    } else {
                        return $voucher->amount - ($voucher->amount - $this->amount);
                    }
                }
            }
        }

        return 0;
    }

    public function getDueAttribute()
    {
        return $this->amount - $this->discount - $this->paid;
    }

    public function getActualDurationAttribute()
    {
        if ($this->seen_at && $this->discharged_at) {
            return $this->seen_at->diff($this->discharged_at)->format("%H:%I");
        }
        return "00:00";
    }

    public function getWaitingTimeAttribute()
    {
        if ($this->arrived_at && $this->seen_at) {
            return $this->arrived_at->diff($this->seen_at)->format("%H:%I");
        }
        return "00:00";
    }

    public function getStatusAttribute()
    {
        if (!empty($this->cancelled_at)) {
            return "cancelled";
        } elseif (now()->between($this->start_at, $this->end_at) && empty($this->arrived_at)) {
            return "late";
        } elseif (!empty($this->arrived_at) && empty($this->seen_at)) {
            return "in-waiting";
        } elseif (!empty($this->arrived_at) && !empty($this->seen_at) && empty($this->discharged_at)) {
            return "in-progress";
        } elseif (!empty($this->discharged_at)) {
            return "attended";
        } elseif (optional($this->start_at)->isAfter(now())) {
            return "confirmed";
        }
        return "unattended";
    }

    // Scopes

    public function scopeNext($query)
    {
        return $query
            ->where("end_at", ">=", now())
            ->where("discharged_at", null)
            ->where("cancelled_at", null)
            ->first();
    }
    public function scopeUpcoming($query)
    {
        return $query
            ->where("end_at", ">=", now())
            ->where("discharged_at", null)
            ->where("cancelled_at", null);
    }
    public function scopeExclude($query, $id)
    {
        return $query->where("id", "!=", $id);
    }
}
