<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

// Models

class MessageUser extends Model
{
    protected $table = "messages_users";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
