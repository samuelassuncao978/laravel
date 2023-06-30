<?php

namespace App\Http\Controllers\Locations;


use App\Models\EmployerLocation;
use Sihq\Facades\Controller;
class Status extends Controller
{

    public EmployerLocation $location;

  
    public function onMount(){
        $props = request()->props;

        $this->location = EmployerLocation::findOrFail(optional($props)['locationId']);
    }

    public function save(){
        $this->location->save();
        $this->redirect('/employers/'.$this->location->employer_id.'/locations');

    }

    
}