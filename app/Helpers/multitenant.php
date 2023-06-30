<?php

use App\Models\System\Tenant;

if (!function_exists("tenant")) {
    function tenant()
    {
        return app("Tenant")->tenant;
    }
}

if (!function_exists("tenants")) {
    function tenants()
    {
        return Tenant::all();
    }
}

if (!function_exists("multitenant")) {
    function multitenant()
    {
        return app("Tenant");
    }
}
