<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

// Models
use App\Models\User;
use App\Models\Message;
// Pivots
use App\Models\Pivots\ConversationUser;
use App\Models\Pivots\ConversationMessage;
// Traits
use App\Traits\UsesUuid;

class Conversation extends Model
{
    use HasFactory, UsesUuid, SoftDeletes;

    protected $table = "conversations";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = ["name"];

    protected $casts = [];

    public function users()
    {
        return $this->belongsToMany(User::class, ConversationUser::class)->withPivot("initiated");
    }

    public function messages()
    {
        return $this->belongsToMany(Message::class, ConversationMessage::class)->withPivot("sender");
    }

    public static function firstOrCreate($users = [])
    {
        $statement = "SELECT CU.conversation_id   FROM conversations_users CU WHERE CU.user_id = " . (optional($users)[0] ?? 0);
        $initiated = collect($users)->shift();
        foreach ($users as $user) {
            $statement .= " AND EXISTS (SELECT NULL FROM conversations_users CUO WHERE CUO.user_id = " . $user . " AND CUO.conversation_id = CU.conversation_id)";
        }
        if ($result = DB::select($statement)) {
            return Conversation::find(collect(DB::select($statement))->first()->conversation_id);
        }

        $conversation = new Conversation();
        $conversation->save();
        $conversation->users()->syncWithoutDetaching([
            User::find($initiated)->id => ["initiated" => true],
        ]);
        foreach ($users as $user) {
            $conversation->users()->syncWithoutDetaching([
                User::find($user)->id => ["initiated" => false],
            ]);
        }

        return $conversation;
    }
}
