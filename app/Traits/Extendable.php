<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

trait Extendable
{
    public function getDataAttribute($value = [])
    {
        return (object) $value;
    }

    public function setDataAttribute($value = [])
    {
        $this->attributes["data"] = (object) $value;
    }
}
