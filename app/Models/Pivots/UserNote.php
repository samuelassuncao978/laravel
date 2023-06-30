<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

// Models

class UserNote extends Model
{
    protected $table = "users_notes";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
