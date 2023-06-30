<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Traits
use App\Traits\UsesUuid;

class Setting extends Model
{
    protected $table = "settings";
    protected $primaryKey = "setting";
    public $incrementing = false;
    protected $keyType = "string";

    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime",
    ];

    protected $fillable = ["setting", "value","group"];
}
