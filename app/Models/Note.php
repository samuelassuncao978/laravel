<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

// Models
use App\Models\User;
use App\Models\Client;

// Pivots
use App\Models\Pivots\UserNote;
use App\Models\Pivots\ClientNote;

// Traits
use App\Traits\UsesUuid;
use App\Traits\ScopeOwned;
use App\Traits\ScopeWithheld;

class Note extends Model
{
    use UsesUuid, ScopeOwned, SoftDeletes, ScopeWithheld;

    protected $table = "notes";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = ["note", "protection", "template_id"];

    // Relationships
    public function users()
    {
        return $this->belongsToMany(User::class, UserNote::class);
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class, ClientNote::class);
    }
}
