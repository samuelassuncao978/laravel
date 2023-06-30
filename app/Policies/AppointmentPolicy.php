<?php

namespace App\Policies;

use App\Models\Appointment;
use App\Models\User;
use App\Models\Intergration;
use Illuminate\Auth\Access\HandlesAuthorization;

class AppointmentPolicy
{
    use HandlesAuthorization;

    public function viewAny($consumer)
    {
        //
        return true;
    }

    public function view($consumer, Appointment $appointment)
    {
        //
        return true;
    }

    public function create($consumer)
    {
        //
        return true;
    }

    public function update($consumer, Appointment $appointment)
    {
        //
        return true;
    }

    public function delete($consumer, Appointment $appointment)
    {
        //
        return true;
    }

    public function restore($consumer, Appointment $appointment)
    {
        //
        return true;
    }

    public function forceDelete($consumer, Appointment $appointment)
    {
        //
        return true;
    }
}
