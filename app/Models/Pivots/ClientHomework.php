<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

// Models

class ClientHomework extends Model
{
    protected $table = "clients_homework";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
