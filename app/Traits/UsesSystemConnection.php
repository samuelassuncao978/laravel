<?php

namespace App\Traits;

trait UsesSystemConnection
{
    public $system = true;
    public function getConnectionName()
    {
        return "central";
    }
}
