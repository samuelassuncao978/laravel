<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

// Models
use App\Models\System\Redirection;

// Exceptions
use App\Exceptions\TenantUnidentifiedException;
use App\Exceptions\TenantConnectionFailedException;
use App\Exceptions\TenantDeletedException;
use App\Exceptions\TenantSuspendedException;
use App\Exceptions\TenantMaintenanceException;

use App\Models\System\Tenant as TenantModel;

class Tenant
{
    public function handle($request, Closure $next)
    {
        app("Tenant")->identify();

        if ($redirection = Redirection::where("from", $request->url())->first()) {
            return redirect()->away($redirection->to);
        }

        if (!tenant()) {
            if (count(tenants()) === 0) {
                if (!str_starts_with($request->path(), "install")) {
                    return redirect("install");
                }
                return $next($request);
            }
            throw new TenantUnidentifiedException();
        }

        if (!app()->environment("production") && optional($request)->immediately) {
            // In development bypass middleware to run purge command.
            return $next($request);
        }

        if (optional(tenant())->deleted_at) {
            throw new TenantDeletedException();
        }

        if (optional(tenant())->suspended_at) {
            throw new TenantSuspendedException();
        }

        if (optional(tenant())->maintenance_at) {
            throw new TenantMaintenanceException();
        }

        if (!optional(tenant()->database)->available()) {
            throw new TenantConnectionFailedException();
        }

        return $next($request);
    }
}
