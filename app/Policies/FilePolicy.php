<?php

namespace App\Policies;

use App\Models\File;
use App\Models\User;
use App\Models\Intergration;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilePolicy
{
    use HandlesAuthorization;

    public function viewAny($consumer)
    {
        //
        return true;
    }

    public function view($consumer, File $file)
    {
        //
        return true;
    }

    public function create($consumer)
    {
        //
        return true;
    }

    public function update($consumer, File $file)
    {
        //
        return true;
    }

    public function delete($consumer, File $file)
    {
        //
        return true;
    }

    public function restore($consumer, File $file)
    {
        //
        return true;
    }

    public function forceDelete($consumer, File $file)
    {
        //
        return true;
    }
}
