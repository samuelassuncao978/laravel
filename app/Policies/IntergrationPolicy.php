<?php

namespace App\Policies;

use App\Models\Intergration;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IntergrationPolicy
{
    use HandlesAuthorization;

    public function viewAny($consumer)
    {
        //
        return true;
    }

    public function view($consumer, Intergration $intergration)
    {
        //
        return true;
    }

    public function create($consumer)
    {
        //
        return true;
    }

    public function update($consumer, Intergration $intergration)
    {
        //
        return true;
    }

    public function delete($consumer, Intergration $intergration)
    {
        //
        return true;
    }

    public function restore($consumer, Intergration $intergration)
    {
        //
        return true;
    }

    public function forceDelete($consumer, Intergration $intergration)
    {
        //
        return true;
    }
}
