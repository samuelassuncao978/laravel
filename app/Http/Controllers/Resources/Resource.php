<?php

namespace App\Http\Controllers\Resources;


use App\Models\Homework;

use Illuminate\Support\Facades\Hash;
use Sihq\Facades\Controller;
class Resource extends Controller
{

    public Homework $resource;

    public function onMount(){
        
        // User::create(['first_name'=>'brad','last_name'=>'martin','email'=>'bradley.r.martin@me.com']);

        $this->resource = Homework::findOrNew(optional(request()->props)['resourceId']);

       if(!$this->resource->content){
           $this->resource->content = [];
       }
     
    }


    public function save(){
       
        $this->resource->save();
    }
   

    
}