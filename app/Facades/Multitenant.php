<?php

namespace App\Facades;

use Illuminate\Support\Carbon;

use App\Models\System\Tenant;
use App\Models\Setting;

class Multitenant
{
    public $tenant;
    public $config;

    public function construct()
    {
        config([
            "database.connections.tenant" => config("database.connections." . config("database.default")),
            "database.connections.central" => config("database.connections." . config("database.default")),
        ]);
        $this->config = config()->all();
    }
    public function identify()
    {
        try {
            if (
                $tenant = Tenant::withTrashed()
                    ->where("domain", request()->ip())
                    ->orWhere("domain", request()->getHost())
                    ->first()
            ) {
                $this->load($tenant);
            }
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }
    }

    public function load(Tenant $tenant)
    {
        $this->unload();
        $this->tenant = $tenant;

        $connection = optional(optional($this->tenant)->database)->toArray() ?? [];
        if ($connection["driver"] === "sqlite") {
            $connection["database"] = storage_path($connection["database"]);
        }

        config([
            "database.default" => "tenant",
            "database.connections.tenant" => $connection,
        ]);

        \DB::purge("tenant");

        try {
            $settings = Setting::where("group", "system")
                ->get()
                ->mapWithKeys(function ($setting) {
                    return [$setting->setting => $setting->value];
                })
                ->toArray();

            config($settings);
        } catch (\Exception $e) {
        }

        /* Set URL */
        if (config("tenants.identification-method") === "domain") {
            url()->forceRootUrl("https://" . $this->tenant->domain);
        }
    }
    public function unload()
    {
        $this->tenant = null;
        config($this->config);
    }

    // Returns currently loaded tenant;
    public function current()
    {
        return $this->tenant;
    }

    // Executes function as tenant
    public function run(Tenant $tenant, $function)
    {
        $current = $this->tenant;
        $this->load($tenant);
        $function();
        if ($current) {
            // Only reload if initially set.
            $this->load($current);
        } else {
            $this->unload();
        }
    }
}
