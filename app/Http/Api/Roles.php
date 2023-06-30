<?php

namespace App\Http\Api;

use App\Models\Role;
use App\Http\Api\BaseResource;

/**
 * @group Appointment Methods
 *
 * APIs for managing appointments
 */
class Roles extends BaseResource
{
    protected $model = Role::class;
}
