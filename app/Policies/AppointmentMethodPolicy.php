<?php

namespace App\Policies;

use App\Models\AppointmentMethod;
use App\Models\User;
use App\Models\Intergration;
use Illuminate\Auth\Access\HandlesAuthorization;

class AppointmentMethodPolicy
{
    use HandlesAuthorization;

    public function viewAny($consumer)
    {
        //
        return true;
    }

    public function view($consumer, AppointmentMethod $appointment_method)
    {
        //
        return true;
    }

    public function create($consumer)
    {
        //
        return true;
    }

    public function update($consumer, AppointmentMethod $appointment_method)
    {
        //
        return true;
    }

    public function delete($consumer, AppointmentMethod $appointment_method)
    {
        //
        return true;
    }

    public function restore($consumer, AppointmentMethod $appointment_method)
    {
        //
        return true;
    }

    public function attachUsers($consumer, AppointmentMethod $appointment_method)
    {
        //
        return true;
    }

    public function attachTypes($consumer, AppointmentMethod $appointment_method)
    {
        //
        return true;
    }

    public function forceDelete($consumer, AppointmentMethod $appointment_method)
    {
        //
        return true;
    }
}
