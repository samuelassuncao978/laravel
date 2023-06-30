<?php

namespace App\Http\Api;

use App\Models\AppointmentType;
use App\Http\Api\BaseResource;

/**
 * @group Appointment Types
 *
 * APIs for managing appointments
 */
class AppointmentTypes extends BaseResource
{
    protected $model = AppointmentType::class;
}
