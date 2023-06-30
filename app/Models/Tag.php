<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Models
use App\Models\User;
use App\Models\Tag;
use App\Models\File;

// Pivots
use App\Models\Pivots\UserTag;
use App\Models\Pivots\FolderTag;
use App\Models\Pivots\FileTag;

// Traits
use App\Traits\UsesUuid;

class Tag extends Model
{
    use UsesUuid, SoftDeletes;

    protected $table = "tags";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [
        // 'id',
        "name",
        "color",
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, UserTag::class);
    }

    public function folders()
    {
        return $this->belongsToMany(Folder::class, FolderTag::class);
    }

    public function files()
    {
        return $this->belongsToMany(File::class, FileTag::class);
    }

    public function items($kind = "all")
    {
        if ($kind === "folders") {
            return $this->folders()->count();
        } elseif ($kind === "files") {
            return $this->files()->count();
        } else {
            return $this->folders()->count() + $this->files()->count();
        }
    }
}
