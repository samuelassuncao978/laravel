<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class TenantUnidentifiedException extends Exception
{
    public function __construct(Throwable $previous = null)
    {
        parent::__construct("Tenant not found", 0, $previous);
    }

    public function render($request)
    {
        return view("pages.warnings.406-tenant-unidentified");
    }
}
