<?php

namespace App\Http\Controllers\Clients;


use App\Models\Client;
use Sihq\Facades\Controller;

use Illuminate\Support\Facades\Hash;


class Create extends Controller
{

    public Client $client;

    public function onMount(){
        dd("sssssssssss");
        $this->client = new Client();
    }

    public function save(){
        dd("wefwefwefwef");
    }

    
}