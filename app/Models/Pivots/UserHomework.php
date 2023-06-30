<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

// Models

class UserHomework extends Model
{
    protected $table = "users_homework";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
