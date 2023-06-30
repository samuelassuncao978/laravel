<?php

namespace App\Http\Api;

use App\Models\User;
use App\Http\Api\BaseResource;

/**
 * @group Users
 *
 * APIs for managing appointments
 */
class Users extends BaseResource
{
    protected $model = User::class;
}
