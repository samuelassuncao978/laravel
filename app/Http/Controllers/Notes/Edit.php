<?php

namespace App\Http\Controllers\Notes;

use App\Models\Client;
use Sihq\Facades\Controller;
class Edit extends Controller
{

    public Client $client;

    public function onMount(){
        $props = request()->props;
        $this->client = Client::findOrFail(optional($this->props())->noteId);
    }
    
    public function save(){
        $this->user->save();
    }

    
}