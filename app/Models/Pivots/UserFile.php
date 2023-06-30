<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

// Models

class UserFile extends Model
{
    protected $table = "users_files";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
