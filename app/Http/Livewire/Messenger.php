<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;

// Models
use App\Models\User;
use App\Models\Message;
use App\Models\Conversation;

class Messenger extends Component
{
    use WithPagination;

    public $rows = 5;
    public $search = "";

    public $unread = 0;

    public $conversation = null;
    public $messages = null;

    public $message = "";
    public $create = false;
    public $show_settings = false;

    public $settings = [
        "initiate" => true,
        "sounds" => true,
        "summaries" => true,
    ];

    public function getListeners()
    {
        return [
            "echo:private-user." . auth()->user()->id . ",Users\\Messages\\Received" => "message_received",
        ];
    }

    public function updatedSettings()
    {
        $user = auth()->user();
        $user->messenger_sounds = $this->settings["sounds"];
        $user->messenger_summaries = $this->settings["summaries"];
        $user->messenger_client_can_initiate = $this->settings["initiate"];
        $user->save();
    }

    public function message_received()
    {
        $this->unread = 1;
        $this->emitSelf("new-message");
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $user = auth()->user();
        $this->settings["sounds"] = $user->messenger_sounds;
        $this->settings["summaries"] = $user->messenger_summaries;
        $this->settings["initiate"] = $user->messenger_client_can_initiate;

        $conversations = auth()
            ->user()
            ->conversations();

        if ($this->conversation) {
            $this->messages = $this->conversation->messages()->get();
        }

        $users = User::where("first_name", "LIKE", "%$this->search%");

        return view("segments.messenger.index", [
            "conversations" => $conversations->get(),
            "users" => $users->paginate($this->rows),
        ]);
    }

    public function open($chat = null)
    {
        $this->open_chat = $chat;
    }

    public function start_new_conversation()
    {
        $conversation = Conversation::firstOrCreate(array_merge([auth()->user()->id], [User::inRandomOrder()->first()->id]));
    }

    public function open_conversation($conversation_id = null)
    {
        $conversation = Conversation::find($conversation_id);
        $this->conversation = $conversation;
    }

    public function open_conversation_with($users = [])
    {
        $conversation = Conversation::firstOrCreate(array_merge([auth()->user()->id], $users));
        $this->conversation = $conversation;
    }

    public function close_conversation()
    {
        $this->conversation = null;
        $this->create = false;
    }

    public function send($text)
    {
        $message = new Message();
        $message->message = $text;
        $message->save();
        $this->conversation->messages()->attach($message, ["sender" => auth()->user()->id]);

        foreach (
            $this->conversation->users->filter(function ($user) use ($message) {
                return $user->id !== auth()->user()->id;
            })
            as $user
        ) {
            event(new \App\Events\Users\Messages\Received($user, $message));
        }

        $this->emitSelf("message-sent");
    }
}
