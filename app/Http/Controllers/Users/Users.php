<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Sihq\Facades\Controller;
class Users extends Controller
{

    public $search = '';

    public $users;

    public $_filter = 'active';

 
    public function onDispatch(){
        $this->users = User::all();
        if($this->search){
            $this->users = User::where('email','LIKE','%'.$this->search.'%')->get();
        }
    }
 
}