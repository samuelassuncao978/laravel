<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Traits
use App\Traits\UsesUuid;

class Template extends Model
{
    use HasFactory, UsesUuid, SoftDeletes;

    protected $table = "templates";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [
        // 'id',
        "notification",
        "properties",
        "template",
    ];

    protected $casts = [
        "properties" => "json",
        "template" => "json",
    ];
}
