<?php

namespace App\Policies;

use App\Models\Setting;
use App\Models\User;
use App\Models\Intergration;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingPolicy
{
    use HandlesAuthorization;

    public function viewAny($consumer)
    {
        //
        return true;
    }

    public function view($consumer, Setting $setting)
    {
        //
        return true;
    }

    public function create($consumer)
    {
        //
        return true;
    }

    public function update($consumer, Setting $setting)
    {
        //
        return true;
    }

    public function delete($consumer, Setting $setting)
    {
        //
        return true;
    }

    public function restore($consumer, Setting $setting)
    {
        //
        return true;
    }

    public function forceDelete($consumer, Setting $setting)
    {
        //
        return true;
    }
}
