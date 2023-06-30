<?php

namespace App\Http\Controllers\Users;


use App\Models\User;
use Sihq\Facades\Controller;
class Delete extends Controller
{

    public User $user;

  
    public function onMount(){
        $props = request()->props;

        $this->user = User::findOrFail(optional($props)['userId']);
    }

    public function save(){
   
        $this->user->delete();
        $this->redirect('/users/');

    }

    
}