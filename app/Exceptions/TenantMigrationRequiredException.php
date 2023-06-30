<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class TenantMigrationRequiredException extends Exception
{
    public function __construct(Throwable $previous = null)
    {
        parent::__construct("Database migration required", 0, $previous);
    }

    public function render($request)
    {
        return view("pages.warnings.502-tenant-migration-required");
    }
}
