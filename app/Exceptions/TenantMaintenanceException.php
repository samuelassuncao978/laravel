<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class TenantMaintenanceException extends Exception
{
    public function __construct(Throwable $previous = null)
    {
        parent::__construct("Tenant is in maintenance", 0, $previous);
    }

    public function render($request)
    {
        return view("pages.warnings.503-tenant-maintenance");
    }
}
