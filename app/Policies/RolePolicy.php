<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use App\Models\Intergration;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function viewAny($consumer)
    {
        //
        return true;
    }

    public function view($consumer, Role $role)
    {
        //
        return true;
    }

    public function create($consumer)
    {
        //
        return true;
    }

    public function update($consumer, Role $role)
    {
        //
        return true;
    }

    public function delete($consumer, Role $role)
    {
        //
        return true;
    }

    public function restore($consumer, Role $role)
    {
        //
        return true;
    }

    public function attachUsers($consumer, Role $role)
    {
        //
        return true;
    }

    public function forceDelete($consumer, Role $role)
    {
        //
        return true;
    }
}
