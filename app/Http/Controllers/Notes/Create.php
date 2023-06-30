<?php

namespace App\Http\Controllers\Notes;


use App\Models\Note;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Sihq\Facades\Controller;

class Create extends Controller
{

    public Note $note;
    public $clients;
    public $client;
    public $template;

    public function onMount(){
        $this->note = new Note();
        $this->clients = Client::all();
    }

    public function save(){
        $this->note->template_id = $this->template;
        $this->note->clients()->sync($this->client);
        $this->note->save();
        $this->redirect('/notes');
    }
}