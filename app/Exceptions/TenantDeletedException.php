<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class TenantDeletedException extends Exception
{
    public function __construct(Throwable $previous = null)
    {
        parent::__construct("Tenant deleted", 0, $previous);
    }

    public function render($request)
    {
        return view("pages.warnings.410-tenant-deleted");
    }
}
