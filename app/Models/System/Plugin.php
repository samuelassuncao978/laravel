<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;

// Models
use App\Models\System\Tenant;

// Pivots
use App\Models\System\Pivots\TenantPlugin;

// Traits
use App\Traits\UsesSystemConnection;
use App\Traits\UsesUuid;

class Plugin extends Model
{
    use UsesSystemConnection, UsesUuid;

    protected $table = "plugins";
    protected $primaryKey = "id";
    public $incrementing = false;
    protected $keyType = "string";

    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime",
        "manifest" => "json",
    ];

    public function getWebhooksAttribute()
    {
        return optional($this->manifest->webhooks)->subscriptions ?? [];
    }

    public function tenants()
    {
        return $this->belongsToMany(Tenant::class, TenantPlugin::class);
    }
}
