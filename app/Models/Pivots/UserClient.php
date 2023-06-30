<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

// Models

class UserClient extends Model
{
    protected $table = "users_clients";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
