<?php

namespace App\Http\Api;

use App\Models\Client;
use App\Http\Api\BaseResource;

/**
 * @group Clients
 *
 * APIs for managing appointments
 */
class Clients extends BaseResource
{
    protected $model = Client::class;
}
