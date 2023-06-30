<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

// Models

class UserTag extends Model
{
    protected $table = "users_tags";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
