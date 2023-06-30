<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

// Models

class HomeworkImage extends Model
{
    protected $table = "homework_images";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
