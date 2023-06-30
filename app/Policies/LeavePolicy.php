<?php

namespace App\Policies;

use App\Models\Leave;
use Illuminate\Auth\Access\HandlesAuthorization;

class LeavePolicy
{
    use HandlesAuthorization;

    public function viewAny($consumer)
    {
        //
        return true;
    }

    public function view($consumer, Leave $modal)
    {
        //
        return true;
    }

    public function create($consumer)
    {
        //
        return true;
    }

    public function update($consumer, Leave $modal)
    {
        //
        return true;
    }

    public function delete($consumer, Leave $modal)
    {
        //
        return true;
    }

    public function restore($consumer, Leave $modal)
    {
        //
        return true;
    }

    public function forceDelete($consumer, Leave $modal)
    {
        //
        return true;
    }
}
