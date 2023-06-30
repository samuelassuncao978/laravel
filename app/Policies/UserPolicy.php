<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Intergration;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny($consumer)
    {
        //
        return true;
    }

    public function viewWithheld(User $modal)
    {
        //
        return true;
    }

    public function view($consumer, User $modal)
    {
        //
        return true;
    }

    public function create($consumer)
    {
        //
        return true;
    }

    public function update($consumer, User $modal)
    {
        //
        return true;
    }

    public function delete($consumer, User $modal)
    {
        //
        return true;
    }

    public function restore($consumer, User $modal)
    {
        //
        return true;
    }

    public function impersonate($consumer, User $modal)
    {
        //
        return true;
    }

    public function forceDelete($consumer, User $modal)
    {
        //
        return true;
    }

    public function uploadFiles(User $user)
    {
        return true;
    }
}
