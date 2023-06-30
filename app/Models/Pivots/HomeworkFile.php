<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

// Models

class HomeworkFile extends Model
{
    protected $table = "homework_files";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
