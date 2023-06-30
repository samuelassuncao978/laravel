<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Models
use App\Models\Conversation;
use App\Models\User;

// Pivots
use App\Models\Pivots\ConversationMessage;
use App\Models\Pivots\MessageUser;

// Traits
use App\Traits\UsesUuid;

class Message extends Model
{
    use HasFactory, UsesUuid, SoftDeletes;

    protected $table = "messages";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = ["message"];

    protected $casts = [];

    public function conversations()
    {
        return $this->belongsToMany(Conversation::class, ConversationMessage::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, MessageUser::class)->withPivot("read_at");
    }

    public function markAsRead()
    {
        $this->newPivotStatement()->update(["read_at" => now()]);
    }

    public function scopeUnread($query, $by = [])
    {
        $by = collect($by);
        return $query->whereHas("users", function ($q) use ($by) {
            if (count($by) > 0) {
                $q->whereIn("id", $by->pluck("id"));
            }
            $q->where("messages_users.read_at", null);
        });
    }

    public function sender()
    {
        return User::find(optional($this->pivot)->sender ?? null) ?? null;
    }
}
