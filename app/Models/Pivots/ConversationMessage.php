<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

// Models

class ConversationMessage extends Model
{
    protected $table = "conversations_messages";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
