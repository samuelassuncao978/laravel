<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Sihq\Facades\Controller;
use Sihq\Traits\Authenticated;

class Main extends Controller
{

    use Authenticated;

    public $user;

    public function onMount(){
        $this->set();
    }

    public function set(){
        $this->user = User::find(optional(auth()->user())->id);
    }
}