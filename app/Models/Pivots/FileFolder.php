<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

// Models

class FileFolder extends Model
{
    protected $table = "files_folders";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
