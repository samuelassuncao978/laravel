<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;

// Models
use App\Models\System\Tenant;
use App\Models\User;

// Exceptions
use App\Exceptions\TenantUnidentifiedException;

class OAuth
{
    public function handle($request, Closure $next)
    {
        if ($request->has("state")) {
            $state = json_decode(base64_decode(Crypt::decryptString($request->input("state"))));

            if ($tenant = Tenant::find($state->tenant)) {
                $tenant->activate();
                if ($user = User::find($state->user)) {
                    Auth::guard("admin")->login($user);
                    return $next($request);
                } else {
                    throw new UnauthorizedException();
                }
            } else {
                throw new TenantUnidentifiedException();
            }
        }
        return $next($request);
    }
}
