<?php

namespace App\Http\Controllers\Tenants;


use App\Models\System\Tenant;
use Sihq\Facades\Controller;
class Delete extends Controller
{

    public Tenant $tenant;

  
    public function onMount(){
        $props = request()->props;

        $this->tenant = Tenant::findOrFail(optional($props)['tenantId']);
    }

    public function save(){
        $this->tenant->delete();
        $this->redirect('/tenants/');

    }

    
}