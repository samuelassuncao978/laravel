<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

// Traits
use App\Traits\UsesUuid;
use App\Traits\ScopeInvisible;
use App\Traits\ScopeWithheld;

class Intergration extends Model
{
    use UsesUuid, HasFactory, Notifiable, ScopeInvisible, ScopeWithheld;

    protected $table = "intergrations";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = ["manifest", "signature"];

    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime",
        "manifest" => "json",
    ];

    protected $hidden = ["signature"];

    protected static function booted()
    {
        parent::boot();
        static::creating(function ($model) {
            if (!optional($model)->id) {
                $model->id = (string) Str::uuid();
            }
            if (!optional($model)->signature) {
                $model->signature = (string) Str::uuid();
            }
        });
    }

    public function getManifestAttribute($value)
    {
        return (object) json_decode($value);
    }

    public function getWebhooksAttribute()
    {
        return optional($this->manifest)->webhooks ?? [];
    }
}
