<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

// Models

class UserFolder extends Model
{
    protected $table = "users_folders";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
