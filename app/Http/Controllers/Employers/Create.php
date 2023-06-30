<?php

namespace App\Http\Controllers\Employers;


use App\Models\Employer;
use Sihq\Facades\Controller;
use Illuminate\Support\Facades\Hash;


class Create extends Controller
{

    public Employer $employer;

    public $rules = [
        'employer.name'=> 'required'
    ];

    public function onMount(){
        $this->employer = new Employer();
    }

    public function save(){
        $this->validate();
 
        $this->employer->save();

        $this->redirect('/employers/'.$this->employer->id);

    }

    
}