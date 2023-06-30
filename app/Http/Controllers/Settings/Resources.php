<?php

namespace App\Http\Controllers\Settings;

use App\Models\Homework;
use App\Models\Locations as LocationsModel;
use Sihq\Facades\Controller;

class Resources extends Controller
{


    public $search = '';
    public $subscribe = ['App.Models.Homework'];

    public $resources;

    public $_filter = 'active';

 
    public function onRender(){
        $this->resources = Homework::all();
        if($this->search){
            $this->resources = Homework::where('name','LIKE','%'.$this->search.'%')->get();
        }
       
        $this->resources->map(function($resource){
            $this->subscribe = array_merge( $this->subscribe,['App.Models.Homework.'.$resource->id]);
        });
    }
 


 
}