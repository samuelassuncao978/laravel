<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

// Models

class FileTag extends Model
{
    protected $table = "files_tags";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
