<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Sihq\Facades\Controller;
class Workflow extends Controller
{
    public function onMount(){
        $this->user = auth()->user();
    }

    public function save(){
        $this->redirect('/');
    }
}