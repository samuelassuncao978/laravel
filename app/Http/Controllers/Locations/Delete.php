<?php

namespace App\Http\Controllers\Locations;


use App\Models\EmployerLocation;
use Sihq\Facades\Controller;
class Delete extends Controller
{

    public EmployerLocation $location;

  
    public function onMount(){
        $props = request()->props;

        $this->location = EmployerLocation::findOrFail(optional($props)['locationId']);
    }

    public function save(){
        $employerId = $this->location->employer->id;
        $this->location->delete();
        $this->redirect('/employers/'.$employerId.'/locations');

    }

    
}