<?php

namespace App\Http\Api;

use Orion\Http\Controllers\Controller;

class BaseResource extends Controller
{
    public function filterableBy(): array
    {
        return (new $this->model())->getFillable() ?? [];
    }
}
