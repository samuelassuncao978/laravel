<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Models
use App\Models\User;

// Pivots
use App\Models\Pivots\UserRole;

// Traits
use App\Traits\UsesUuid;
use App\Traits\ScopeWithheld;
use App\Traits\ScopeInvisible;

class Role extends Model
{
    use UsesUuid, HasFactory, SoftDeletes, ScopeWithheld, ScopeInvisible;

    protected $table = "roles";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = ["name", "invisible"];

    public function users()
    {
        return $this->belongsToMany(User::class, UserRole::class);
    }
}
