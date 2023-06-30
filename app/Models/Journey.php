<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Models
use App\Models\Client;

// Pivots
use App\Models\Pivots\ClientJourney;

// Traits
use App\Traits\UsesUuid;

class Journey extends Model
{
    use UsesUuid, SoftDeletes;

    protected $table = "journeys";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = ["name"];
}
