<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

// Models

class ClientFile extends Model
{
    protected $table = "clients_files";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
