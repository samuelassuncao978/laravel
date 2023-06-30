<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

// Models

class UserCalendar extends Model
{
    protected $table = "user_calendars";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
