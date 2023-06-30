<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

class ClientEmployerLocation extends Model
{
    protected $table = "clients_employers_locations";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
