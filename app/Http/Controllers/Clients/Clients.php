<?php

namespace App\Http\Controllers\Clients;

use App\Models\Client;
use Sihq\Facades\Controller;
class Clients extends Controller
{

    public $search = '';

    public $clients;

    public function onMount(){
        $this->clients = Client::all();
    }

    public function onDispatch(){
        $this->clients = Client::all();
    }
}