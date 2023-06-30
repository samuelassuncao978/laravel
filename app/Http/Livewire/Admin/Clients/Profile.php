<?php

namespace App\Http\Livewire\Admin\Clients;

// Illuminate
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Livewire\Component;

// Models
use App\Models\Client;

// Traits
use App\Traits\Livewire\Groupable;
use App\Traits\Livewire\Searchable;
use App\Traits\Livewire\Paginatable;

class Profile extends Component
{
    use Paginatable, Groupable, Searchable;

    public Client $client;

    public $rules = [
        "client.preferred_name" => "string",
        "client.date_of_birth" => "date",
        "client.first_name" => "required",
        "client.last_name" => "required",
        "client.sex" => "string",
        "client.pronouns" => "string",
        "client.sexual_orientation" => "string",
        "client.email" => "required",
        "client.phone.number" => "required",
        "client.phone.country" => "required",

        "client.photo.name" => "required",
        "client.photo.size" => "nullable",
        "client.photo.mime" => "nullable",
        "client.photo.id" => "uuid",
    ];

    public function render()
    {
        return view("pages.admin.clients.profile");
    }

    public function save()
    {
        $this->client->save();
    }
}
