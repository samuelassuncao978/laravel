<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AssignRequestContext
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $requestId = (string) Str::uuid();
        $context = [
            "tenant-id" => optional(tenant())->id,
            "user-id" => optional(user())->id,
            "session-id" => optional(session())->getId(),
            "request-id" => $requestId,
        ];
        Log::withContext($context);

        return $next($request)->withHeaders($context);
    }
}
