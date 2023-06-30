<?php

namespace App\Policies;

use App\Models\System\Tenant;
use App\Models\User;
use App\Models\Intergration;
use Illuminate\Auth\Access\HandlesAuthorization;

class TenantPolicy
{
    use HandlesAuthorization;

    public function viewAny($consumer)
    {
        //
        return true;
    }

    public function view($consumer, Tenant $tenant)
    {
        //
        return true;
    }

    public function create($consumer)
    {
        //
        return true;
    }

    public function update($consumer, Tenant $tenant)
    {
        //
        return true;
    }

    public function enterMaintenance($consumer, Tenant $tenant)
    {
        //
        return true;
    }

    public function exitMaintenance($consumer, Tenant $tenant)
    {
        //
        return true;
    }

    public function suspend($consumer, Tenant $tenant)
    {
        //
        return true;
    }

    public function unsuspend($consumer, Tenant $tenant)
    {
        //
        return true;
    }

    public function accessDatabase($consumer, Tenant $tenant)
    {
        //
        return true;
    }

    public function delete($consumer, Tenant $tenant)
    {
        //
        return true;
    }

    public function restore($consumer, Tenant $tenant)
    {
        //
        return true;
    }

    public function forceDelete($consumer, Tenant $tenant)
    {
        //
        return true;
    }
}
