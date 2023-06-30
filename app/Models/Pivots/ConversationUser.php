<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

// Models

class ConversationUser extends Model
{
    protected $table = "conversations_users";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
