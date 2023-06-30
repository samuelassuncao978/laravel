<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Sihq\Facades\Controller;
use Illuminate\Support\Facades\Auth;

class ModalSteps extends Controller
{

    public $users;

    public $rules = [
        'user.first_name'=> 'required',
        'user.last_name'=> 'required',
        'user.email'=> 'required|email'
    ];

    public function onDispatch(){
        $this->user = Auth::user();
    }

    public function save(){
        dd("wwwwww");
        $this->redirect('/login');
    }
}