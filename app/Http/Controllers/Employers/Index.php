<?php

namespace App\Http\Controllers\Employers;

use App\Models\Employer;
use Sihq\Facades\Controller;
class Index extends Controller
{

    public $search = '';
    public $subscribe = ['App.Models.User'];

    public $employers;

    public $_filter = 'active';

 
    public function onRender(){
        $this->employers = Employer::all();
        if($this->search){
            $this->employers = Employer::where('name','LIKE','%'.$this->search.'%')->get();
        }
       
        $this->employers->map(function($employer){
            $this->subscribe = array_merge( $this->subscribe,['App.Models.Employer.'.$employer->id]);
        });
    }
 
}