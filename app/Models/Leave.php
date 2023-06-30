<?php

namespace App\Models;

// Illuminate
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

// Models
use App\Models\User;

// Pivots
use App\Models\Pivots\UserLeave;

// Traits
use App\Traits\UsesUuid;
use App\Traits\ScopeOwned;

class Leave extends Model
{
    use UsesUuid, HasFactory, ScopeOwned, SoftDeletes;

    protected $table = "leave";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = ["description", "start_at", "end_at", "approved", "approved_by", "type"];

    protected $casts = [
        "start_at" => "datetime",
        "end_at" => "datetime",
        "approved" => "boolean",
    ];

    // Relationships
    public function users()
    {
        return $this->belongsToMany(User::class, UserLeave::class);
    }
}
