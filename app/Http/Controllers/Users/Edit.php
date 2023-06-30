<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Sihq\Facades\Controller;
class Edit extends Controller
{

    public User $user;

    public $rules = [
        'user.first_name'=> 'required',
        'user.last_name'=> 'required'
    ];

    public function onMount(){
        $props = request()->props;
        $this->user = User::findOrFail(optional($this->props())->userId);
    }
    
    public function save(){
        $this->validate();
        $this->user->save();
    }

    
}