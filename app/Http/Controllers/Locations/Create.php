<?php

namespace App\Http\Controllers\Locations;


use App\Models\EmployerLocation;
use Sihq\Facades\Controller;
use Illuminate\Support\Facades\Hash;


class Create extends Controller
{

    public EmployerLocation $location;

    public $rules = [
        'location.name'=> 'required'
    ];

    public function onMount(){
        $this->location = new EmployerLocation();
    }

    public function save(){
        $this->validate();
        $this->location->employer_id = optional(request()->props)['employerId'];
        $this->location->save();
       

        $this->redirect('/employers/'.$this->location->employer_id.'/locations');

    }

    
}