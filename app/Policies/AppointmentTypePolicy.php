<?php

namespace App\Policies;

use App\Models\AppointmentType;
use App\Models\User;
use App\Models\Intergration;
use Illuminate\Auth\Access\HandlesAuthorization;

class AppointmentTypePolicy
{
    use HandlesAuthorization;

    public function viewAny($consumer)
    {
        //
        return true;
    }

    public function view($consumer, AppointmentType $appointment_type)
    {
        //
        return true;
    }

    public function create($consumer)
    {
        //
        return true;
    }

    public function update($consumer, AppointmentType $appointment_type)
    {
        //
        return true;
    }

    public function delete($consumer, AppointmentType $appointment_type)
    {
        //
        return true;
    }

    public function restore($consumer, AppointmentType $appointment_type)
    {
        //
        return true;
    }

    public function attachUsers($consumer, AppointmentType $appointment_type)
    {
        //
        return true;
    }

    public function attachMethods($consumer, AppointmentType $appointment_type)
    {
        //
        return true;
    }

    public function forceDelete($consumer, AppointmentType $appointment_type)
    {
        //
        return true;
    }
}
