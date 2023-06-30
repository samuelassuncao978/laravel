<?php

namespace App\Http\Controllers\Tenants;

use App\Models\System\Tenant;
use Sihq\Facades\Controller;
class Tenants extends Controller
{

    public $search = '';
 
    public $tenants;

    public $_filter = 'active';

 
    public function onDispatch(){
        $this->tenants = Tenant::all();
        if($this->search){
            $this->tenants = Tenant::where('domain','LIKE','%'.$this->search.'%')->get();
        }
       
     
    }
 
}