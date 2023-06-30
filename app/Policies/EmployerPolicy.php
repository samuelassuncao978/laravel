<?php

namespace App\Policies;

use App\Models\Employer;
use App\Models\User;
use App\Models\Intergration;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployerPolicy
{
    use HandlesAuthorization;

    public function viewAny($consumer)
    {
        //
        return true;
    }

    public function view($consumer, Employer $employer)
    {
        //
        return true;
    }

    public function create($consumer)
    {
        //
        return true;
    }

    public function update($consumer, Employer $employer)
    {
        //
        return true;
    }

    public function delete($consumer, Employer $employer)
    {
        //
        return true;
    }

    public function restore($consumer, Employer $employer)
    {
        //
        return true;
    }

    public function forceDelete($consumer, Employer $employer)
    {
        //
        return true;
    }
}
