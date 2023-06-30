<?php

namespace App\Policies;

use App\Models\Client;
use App\Models\User;
use App\Models\Intergration;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientPolicy
{
    use HandlesAuthorization;

    public function viewAny($consumer)
    {
        //
        return true;
    }

    public function view($consumer, Client $client)
    {
        //
        return true;
    }

    public function create($consumer)
    {
        //
        return true;
    }

    public function update($consumer, Client $client)
    {
        //
        return true;
    }

    public function delete($consumer, Client $client)
    {
        //
        return true;
    }

    public function restore($consumer, Client $client)
    {
        //
        return true;
    }

    public function forceDelete($consumer, Client $client)
    {
        //
        return true;
    }
}
