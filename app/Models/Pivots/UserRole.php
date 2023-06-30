<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

// Models

class UserRole extends Model
{
    protected $table = "users_roles";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
