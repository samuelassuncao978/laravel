<?php

namespace App\Policies;

use App\Models\Calendar;
use App\Models\User;
use App\Models\Intergration;
use Illuminate\Auth\Access\HandlesAuthorization;

class CalendarPolicy
{
    use HandlesAuthorization;

    public function viewAny($consumer)
    {
        //
        return true;
    }

    public function view($consumer, Calendar $calendar)
    {
        //
        return true;
    }

    public function create($consumer)
    {
        //
        return true;
    }

    public function update($consumer, Calendar $calendar)
    {
        //
        return true;
    }

    public function delete($consumer, Calendar $calendar)
    {
        //
        return true;
    }

    public function restore($consumer, Calendar $calendar)
    {
        //
        return true;
    }

    public function forceDelete($consumer, Calendar $calendar)
    {
        //
        return true;
    }
}
