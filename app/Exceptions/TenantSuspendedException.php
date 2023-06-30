<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class TenantSuspendedException extends Exception
{
    public function __construct(Throwable $previous = null)
    {
        parent::__construct("Tenant is suspended", 0, $previous);
    }

    public function render($request)
    {
        return view("pages.warnings.451-tenant-suspended");
    }
}
