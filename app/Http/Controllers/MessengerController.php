<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Traits
use App\Traits\RedirectionRoutes;

// Models
use App\Models\User;
use App\Models\Message;
use App\Models\Conversation;

class MessengerController extends Controller
{
    public function store(Request $request)
    {
        $message = "dfsfsdf";
        $sender = User::find(1);
        $users = collect([User::find(1), User::find(4), User::find(3), User::find(8)]);

        $conversation = Conversation::firstOrCreate($users->pluck("id"));

        $conversation->users()->syncWithoutDetaching(
            $users->mapWithKeys(function ($user) use ($sender) {
                return [
                    $user->id => ["initiated" => $user->id === $sender->id],
                ];
            })
        );

        $message = Message::create(["message" => $message]);

        $conversation->messages()->attach($message, ["sender" => $sender->id]);

        $message->users()->attach(
            $users->mapWithKeys(function ($user) use ($sender) {
                return [
                    $user->id => [
                        "read_at" => $user->id === $sender->id ? now() : null,
                    ],
                ];
            })
        );
        foreach (
            $users->filter(function ($user) use ($sender) {
                return $user->id !== $sender->id;
            })
            as $user
        ) {
            event(new \App\Events\Users\Messages\Received($user, $message));
        }

        dd($conversation->messages()->unread([User::find(4), User::find(3)]));
    }
}
