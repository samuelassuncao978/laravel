<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class DateTime implements CastsAttributes
{
    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     *
     * @return Carbon|mixed
     */
    public function get($model, string $key, $value, array $attributes)
    {
        if ($value === null) {
            return null;
        }

        return timezone()->local($value);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     *
     * @return array|Carbon|string
     */
    public function set($model, string $key, $value, array $attributes)
    {
        return timezone()->utc($value);
    }
}
