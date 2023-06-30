<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

// Models

class UserLeave extends Model
{
    protected $table = "users_leave";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
