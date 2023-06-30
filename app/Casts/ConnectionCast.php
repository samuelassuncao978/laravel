<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\Castable;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Facades\Crypt;

class ConnectionCast implements Castable
{
    public static function castUsing(array $arguments)
    {
        return new class implements CastsAttributes {
            public function get($model, $key, $value, $attributes)
            {
                if ($value) {
                    return decrypt($value);
                }
                return null;
            }

            public function set($model, $key, $value, $attributes)
            {
                if ($value) {
                    return encrypt($value);
                }
                return null;
            }
        };
    }
}
