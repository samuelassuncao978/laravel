<?php

namespace App\Http\Livewire\Video;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

// Twilio
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;

// Notifications
use App\Notifications\Users\Appointments\ClientArrivedNotification;

// Events
use App\Events\Session\Started;
use App\Events\Session\Ended;

// Models
use App\Models\User;
use App\Models\Appointment;

// Events
use App\Events\Users\Video\Calling;
use App\Events\Users\Video\Accepted;

class Player extends Component
{
    public Appointment $appointment;
    public $session;

    public $token;
    public $identity;
    public $status;

    public $participants;
    public $isHost = false;

    public function getListeners()
    {
        return [
            "echo:session." . $this->appointment->id . ",Session\\Started" => "session_started",
            "echo:session." . $this->appointment->id . ",Session\\Ended" => "session_ended",
        ];
    }
    public function session_started()
    {
        // Host started session
        $this->status = "admitted";
    }
    public function session_ended()
    {
        // Host ended session
        $this->status = "discharged";
    }

    public function mount()
    {
        $session = json_decode(base64_decode($this->session));

        $this->identity = $session->user;
        $this->appointment = Appointment::find($session->appointment);

        $this->participants = collect([]);

        $this->isHost = optional($this->appointment->users()->first())->id === $this->identity;
    }

    public function notify()
    {
        $this->appointment
            ->users()
            ->first()
            ->notify(new ClientArrivedNotification($this->appointment));
    }

    public function render()
    {
        return view("pages.video.livewire")->layout("components.container");
    }

    public function h_start()
    {
        $this->appointment->seen_at = now();
        $this->appointment->save();
        event(new Started($this->appointment));
    }
    public function h_end()
    {
        $this->appointment->discharged_at = now();
        $this->appointment->save();
        event(new Ended($this->appointment));
    }
    public function h_reset()
    {
        $this->appointment->seen_at = null;
        $this->appointment->discharged_at = null;
        $this->appointment->arrived_at = null;
        $this->appointment->save();
    }

    public function connected($participant)
    {
        $user = User::find($participant);
        $this->participants->put(
            $participant,
            array_merge($user->toArray(), [
                "isMe" => $user->id === $this->identity,
            ])
        );
    }

    public function disconnect($participant)
    {
        $user = User::find($participant);
        $this->participants->forget($participant);
    }

    public function start()
    {
        $token = new AccessToken(env("TWILIO_ACCOUNT_SID"), env("TWILIO_API_KEY_SID"), env("TWILIO_API_KEY_SECRET"), 3600, $this->identity);
        $grant = new VideoGrant();
        $grant->setRoom($this->appointment->id);
        $token->addGrant($grant);
        $this->token = $token->toJWT();

        if ($this->appointment->seen_at) {
            $this->status = "admitted";
        } else {
            $this->status = "waiting";
        }
    }
}
