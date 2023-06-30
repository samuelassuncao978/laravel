<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Model;

// Models

class FolderTag extends Model
{
    protected $table = "folders_tags";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [];
}
