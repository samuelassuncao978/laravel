<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\VaporUi\Repositories\LogsRepository;

// Models
use App\Models\System\Plugin;

// Pivots
use App\Models\System\Pivots\TenantSetting;
use App\Models\System\Pivots\TenantInvoice;
use App\Models\System\Pivots\TenantPlugin;

// Casts
use App\Casts\ConnectionCast;

// Traits
use App\Traits\UsesSystemConnection;
use App\Traits\UsesUuid;

class Tenant extends Model
{
    use UsesUuid, UsesSystemConnection, SoftDeletes, HasFactory;

    protected $table = "tenants";
    protected $primaryKey = "id";
    protected $keyType = "string";

    protected $casts = [
        "customer" => "json",
        "maintenance_at" => "datetime",
        "suspended_at" => "datetime",
        "deleted_at" => "datetime",
        "database" => ConnectionCast::class,
    ];

    protected $fillable = ["customer", "suspended_reason", "suspended_at", "maintenance_reason", "maintenance_at", "plan", "domain", "database", "id"];

    public static function booted()
    {
        parent::boot();

        static::creating(function ($tenant) {
            if (empty($tenant->{$tenant->getKeyName()})) {
                $tenant->{$tenant->getKeyName()} = Str::uuid()->toString();
            }
        });
        static::forceDeleted(function ($tenant) {
            optional($tenant->database)->delete();
        });
    }

    /*- Relationships */
    public function invoices()
    {
        return $this->belongsToMany(Invoice::class, TenantInvoice::class);
    }

    public function plugins()
    {
        return $this->belongsToMany(Plugin::class, TenantPlugin::class);
    }

    public function getStatusAttribute()
    {
        if ($this->suspended_at) {
            return "suspended";
        } elseif ($this->maintenance_at) {
            return "maintenance";
        } elseif ($this->deleted_at) {
            return "deleted";
        }
        return "active";
    }

    public function getObsoleteAtAttribute()
    {
        return Carbon::createFromTimestamp(strtotime($this->deleted_at) - (strtotime("now") - strtotime("+14 days")));
    }

    public function getOnTrialAttribute()
    {
        $trial = new \Illuminate\Support\Carbon(optional(optional($this->plans->first())->pivot)->trial_end_at ?? now());
        return $trial->isAfter(now()) ? true : false;
    }

    /*- Scopes */
    public function scopeObsolete($query)
    {
        return $query->onlyTrashed()->where("deleted_at", "<=", now()->sub(strtotime("+14 days") - strtotime(now()), "seconds"));
    }

    public function activate()
    {
        return multitenant()->load($this);
    }

    public function logs()
    {
        $repository = app(LogsRepository::class);

        $filter = [
            "startTime" => now()->subDays(1)->timestamp,
            "type" => "error",
            "group" => "http",
            "query" => "",
        ];
        return $repository->search("http", $filter);
    }

    public function migrate()
    {
        multitenant()->run($this, function () {
            \Artisan::call("tenants:migrate", [
                "--force" => true,
                "--tenant" => $this->id,
            ]);
        });
        return \Artisan::output();
    }

    public function seed($type = null)
    {
        multitenant()->run($this, function () use ($type) {
            \Artisan::call("tenants:seed", [
                "--force" => true,
                "--tenant" => $this->id,
                "class" => $type ?? "DatabaseSeeder",
            ]);
        });
        return \Artisan::output();
    }

    public function run($function)
    {
        multitenant()->run($this, function () use ($function) {
            $function();
        });
    }
}
