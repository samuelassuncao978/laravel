<?php

namespace App\Http\Controllers\Employers;

use App\Models\Employer;
use App\Models\Locations as LocationsModel;
use Sihq\Facades\Controller;
class Locations extends Controller
{


    public Employer $employer;

    public $search = '';
    public $subscribe = ['App.Models.Employer'];

    public $locations;

    public $_filter = 'active';

 

    public function onMount(){
        $props = request()->props;
        $this->employer = Employer::findOrFail(optional($props)['employerId']);

    }


    public function onRender(){
        $this->locations = $this->employer->locations;
        if($this->search){
            $this->locations = $this->employer->locations()::where('name','LIKE','%'.$this->search.'%')->get();
        }
       
        $this->locations->map(function($location){
            $this->subscribe = array_merge( $this->subscribe,['App.Models.Location.'.$location->id]);
        });
    }
 
}