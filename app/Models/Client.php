<?php

namespace App\Models;

// Illuminate
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// Models
use App\Models\User;
use App\Models\File;
use App\Models\Note;
use App\Models\Appointment;
use App\Models\Employer;
use App\Models\EmployerLocation;
use App\Models\Homework;

// Pivots
use App\Models\Pivots\UserClient;
use App\Models\Pivots\ClientFile;
use App\Models\Pivots\ClientNote;
use App\Models\Pivots\ClientAppointment;
use App\Models\Pivots\ClientEmployer;
use App\Models\Pivots\ClientEmployerLocation;
use App\Models\Pivots\ClientHomework;

// Traits
use App\Traits\UsesUuid;
use App\Traits\ScopeOwned;

// Casts
use App\Casts\PhoneCast;

class Client extends Authenticatable
{
    use UsesUuid, HasFactory, Notifiable, ScopeOwned, SoftDeletes;

    protected $table = "clients";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = ["first_name", "last_name", "email", "preferred_name", "date_of_birth", "sex", "pronouns", "sexual_orientation", "phone", "address", "photo", "password"];

    protected $casts = [
        "date_of_birth" => "date:Y-m-d",
        "created_at" => "date",
        "updated_at" => "date",
        "deleted_at" => "date",
        "phone" => PhoneCast::class,
    ];

    protected static function booted()
    {
        parent::boot();
        static::creating(function ($model) {
            if (!optional($model)->id) {
                $model->id = (string) Str::uuid();
            }
            if (!optional($model)->password) {
                $model->password = (string) Str::uuid();
            }
        });
    }

    // Attributes
    public function getNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function getAgeAttribute()
    {
        return $this->date_of_birth ? Carbon::parse($this->date_of_birth)->age : null;
    }

    public function getDateOfBirthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format("Y-m-d") : null;
    }

    // Mutators
    public function setDateOfBirthAttribute($value)
    {
        $this->attributes["date_of_birth"] = $value ? Carbon::createFromFormat("Y-m-d", $value) : null;
    }

    // Relationships
    public function users()
    {
        return $this->belongsToMany(User::class, UserClient::class);
    }

    public function files()
    {
        return $this->belongsToMany(File::class, ClientFile::class);
    }

    public function notes()
    {
        return $this->belongsToMany(Note::class, ClientNote::class);
    }

    public function appointments()
    {
        return $this->belongsToMany(Appointment::class, ClientAppointment::class);
    }

    public function employers()
    {
        return $this->belongsToMany(Employer::class, ClientEmployer::class);
    }

    public function locations()
    {
        return $this->belongsToMany(EmployerLocation::class, ClientEmployerLocation::class);
    }

    public function homework()
    {
        return $this->belongsToMany(Homework::class, ClientHomework::class);
    }
}
