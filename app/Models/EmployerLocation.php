<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Models
use App\Models\Employer;

// Traits
use App\Traits\UsesUuid;

class EmployerLocation extends Model
{
    use UsesUuid, HasFactory, SoftDeletes;

    protected $table = "employer_locations";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = ["name"];

    // Relationships
    public function employer()
    {
        return $this->hasOne(Employer::class, "id", "employer_id");
    }
}
