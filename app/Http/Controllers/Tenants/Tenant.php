<?php

namespace App\Http\Controllers\Tenants;

use App\Models\System\Tenant as TenantModel;
use Sihq\Facades\Controller;
class Tenant extends Controller
{

    public TenantModel $tenant;

    public function onMount(){
        $props = request()->props;
        $this->tenant = TenantModel::findOrFail(optional($props)['tenantId']);

    }

}