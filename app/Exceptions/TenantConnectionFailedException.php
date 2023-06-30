<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class TenantConnectionFailedException extends Exception
{
    public function __construct(Throwable $previous = null)
    {
        parent::__construct("Tenant database connection failed", 0, $previous);
    }

    public function render($request)
    {
        return view("pages.warnings.504-tenant-connection-failed");
    }
}
