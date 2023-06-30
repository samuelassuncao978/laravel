<?php

namespace App\Http\Livewire\Admin\Calendar;

// Illuminate
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;

use App\Http\Livewire\Component;

// Models
use App\Models\Calendar;

// Traits
use App\Traits\Livewire\Modal;

class Authorize extends Component
{
    public $authenticated = false;

    public $type = null;
    public $code = null;

    public function mount(Request $request)
    {
        if ($request->has("state")) {
            $this->code = $request->input("code");
            if ($request->header("origin") === "https://login.microsoftonline.com" || $request->header("origin") === "https://login.live.com") {
                $this->type = "outlook";
            } elseif ($request->header("origin") === "https://accounts.google.com") {
                $this->type = "gmail";
            }
            $this->authenticate_token();
            $this->authenticated = true;
        }
    }

    public function render()
    {
        if ($this->authenticated) {
            return view("segments.admin.calendar.connect.complete")->layout("components.container");
        } else {
            return view("segments.admin.calendar.connect.authorize")->layout("components.container");
        }
    }

    public function authenticate_token()
    {
        /**
         * Authenticate token
         */
        switch ($this->type) {
            case "gmail":
                $response = Http::asForm()->post(config("services.google.token_url"), [
                    "client_id" => config("services.google.client_id"),
                    "client_secret" => config("services.google.client_secret"),
                    "redirect_uri" => config("services.google.redirect_uri"),
                    "grant_type" => "authorization_code",
                    "code" => $this->code,
                ]);
                break;
            case "outlook":
                $response = Http::asForm()->post(config("services.microsoft_graph.token_url"), [
                    "client_id" => config("services.microsoft_graph.client_id"),
                    "client_secret" => config("services.microsoft_graph.client_secret"),
                    "redirect_uri" => config("services.microsoft_graph.redirect_uri"),
                    "grant_type" => "authorization_code",
                    "code" => $this->code,
                ]);
                break;
        }

        if ($response->failed()) {
            dd($response->body());
        }

        /**
         * Let's delete all of the current user's calendars
         */
        auth()
            ->guard("admin")
            ->user()
            ->calendars()
            ->forceDelete();

        /**
         * Create a calendar and then sync it
         */
        (new Calendar())
            ->createFromProvider($this->type, $response->json())
            ->setExternalId()
            ->sync()
            ->watch();
    }

    public function oauth_payload()
    {
        $payload = [
            "user" => auth()
                ->guard("admin")
                ->user()->id,
            "tenant" => tenant()->id,
        ];
        return Crypt::encryptString(base64_encode(json_encode($payload)));
    }
}
