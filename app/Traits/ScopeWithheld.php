<?php

namespace App\Traits;

use App\Models\User;

trait ScopeWithheld
{
    public function scopeWithheld($query)
    {
        if (session()->get("withdeld") === true) {
            return $query->withTrashed()->orderBy("deleted_at");
        }
        return $query;
    }
}
