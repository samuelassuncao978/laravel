<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Models
use App\Models\Client;
use App\Models\User;
use App\Models\File;

// Pivots
use App\Models\Pivots\ClientHomework;
use App\Models\Pivots\UserHomework;
use App\Models\Pivots\HomeworkFile;
use App\Models\Pivots\HomeworkImage;

// Traits
use App\Traits\UsesUuid;
use App\Traits\ScopeOwned;

class Homework extends Model
{
    use UsesUuid, SoftDeletes, ScopeOwned;

    protected $table = "homework";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = ["name","content"];

    protected $casts = [
        "content" => "json"
    ];

    public function clients()
    {
        return $this->belongsToMany(Client::class, ClientHomework::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, UserHomework::class);
    }

    public function files()
    {
        return $this->belongsToMany(File::class, HomeworkFile::class);
    }

    public function images()
    {
        return $this->belongsToMany(File::class, HomeworkImage::class);
    }
}
