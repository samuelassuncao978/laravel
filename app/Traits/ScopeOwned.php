<?php

namespace App\Traits;

use App\Models\User;

trait ScopeOwned
{
    public function scopeOwned($query, User $user = null)
    {
        // return $query;
        return $query->whereHas("users", function ($q) use ($user) {
            $q->where(
                "id",
                $user ??
                    optional(
                        auth()
                            ->guard("admin")
                            ->user()
                    )->id
            );
        });
    }
}
