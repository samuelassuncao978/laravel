<?php

namespace App\Http\Controllers\Tenants;


use App\Models\System\Tenant;
use Sihq\Facades\Controller;
class EnterMaintenance extends Controller
{

    public Tenant $tenant;

  
    public function onMount(){
        $props = request()->props;

        $this->tenant = Tenant::findOrFail(optional($props)['tenantId']);
    }

    public function save(){
        $this->tenant->maintenance_at = now();
        $this->tenant->save();
        $this->redirect('/tenants/'.$this->tenant->id);

    }

    
}