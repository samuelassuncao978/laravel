<?php

namespace App\Http\Api;

use App\Models\AppointmentMethod;
use App\Http\Api\BaseResource;

/**
 * @group Appointment Methods
 *
 * APIs for managing appointments
 */
class AppointmentMethods extends BaseResource
{
    protected $model = AppointmentMethod::class;
}
