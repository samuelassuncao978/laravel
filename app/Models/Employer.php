<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Models
use App\Models\Client;
use App\Models\EmployerLocation;
use App\Models\Appointment;

// Pivots
use App\Models\Pivots\ClientEmployer;

// Traits
use App\Traits\UsesUuid;

class Employer extends Model
{
    use UsesUuid, HasFactory, SoftDeletes;

    protected $table = "employers";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = ["name"];

    // Relationships
    public function clients()
    {
        return $this->belongsToMany(Client::class, ClientEmployer::class);
    }

    public function appointments()
    {
        return Appointment::whereHas("clients", function ($query) {
            $query->whereHas("employers", function ($query) {
                $query->where("id", $this->id);
            });
        })->where("payee", "employer");

        return $this->clients()->appointments();
    }

    // Relationships
    public function locations()
    {
        return $this->hasMany(EmployerLocation::class);
    }
}
