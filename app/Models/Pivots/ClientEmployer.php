<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

class ClientEmployer extends Model
{
    protected $table = "employers_clients";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
