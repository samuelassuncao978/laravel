<?php

namespace App\Traits;

trait ScopeInvisible
{
    public function scopeInvisible($query)
    {
        if (
            auth()
                ->guard("admin")
                ->hasUser() &&
            optional(
                auth()
                    ->guard("admin")
                    ->user()
            )->role !== "Developer"
        ) {
            return $query->where("invisible", false);
        }
        return $query;
    }
}
