<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Models
use App\Models\User;
use App\Models\Tag;
use App\Models\File;

// Pivots
use App\Models\Pivots\UserFolder;
use App\Models\Pivots\FolderTag;
use App\Models\Pivots\FileFolder;
// Traits
use App\Traits\UsesUuid;
use App\Traits\ScopeOwned;

class Folder extends Model
{
    use UsesUuid, SoftDeletes, ScopeOwned;

    protected $table = "folders";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [
        // 'id',
        "name",
        "parent",
        "icon",
    ];

    public function files()
    {
        return $this->belongsToMany(File::class, FileFolder::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, UserFolder::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, FolderTag::class);
    }

    public function parent_folder()
    {
        return $this->hasOne(Folder::class, "id", "parent");
    }
    public function children_folders()
    {
        return $this->hasMany(Folder::class, "parent", "id");
    }

    public function items($kind = "all")
    {
        if ($kind === "folders") {
            return $this->children_folders()->count();
        } elseif ($kind === "files") {
            return $this->files()->count();
        } else {
            return $this->children_folders()->count() + $this->files()->count();
        }
    }

    public function path()
    {
        $folders = [];

        $parent = $this->parent_folder;
        while ($parent) {
            $folders[] = (object) $parent->only(["id", "name"]);
            $parent = $parent->parent_folder;
        }
        return array_reverse($folders);
    }
}
