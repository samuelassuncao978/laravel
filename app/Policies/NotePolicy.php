<?php

namespace App\Policies;

use App\Models\Note;
use App\Models\User;
use App\Models\Intergration;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotePolicy
{
    use HandlesAuthorization;

    public function viewAny($consumer)
    {
        //
        return true;
    }

    public function view($consumer, Note $note)
    {
        //
        return true;
    }

    public function create($consumer)
    {
        //
        return true;
    }

    public function update($consumer, Note $note)
    {
        //
        return true;
    }

    public function delete($consumer, Note $note)
    {
        //
        return true;
    }

    public function restore($consumer, Note $note)
    {
        //
        return true;
    }

    public function forceDelete($consumer, Note $note)
    {
        //
        return true;
    }
}
