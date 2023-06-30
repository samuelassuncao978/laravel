<?php

namespace App\Http\Api;

use App\Http\Api\BaseResource;

// Models
use App\Models\Appointment;
use App\Models\User;

/**
 * @group Appointments
 *
 * APIs for managing appointments
 */
class Appointments extends BaseResource
{
    protected $model = Appointment::class;

    protected function performStore($request, $appointment, array $attributes): void
    {
        $appointment->fill($attributes);
        $appointment->save();

        if (optional($attributes)["user_id"]) {
            $appointment->users()->attach($attributes["user_id"]);
        }
        if (optional($attributes)["client_id"]) {
            $appointment->clients()->attach($attributes["client_id"]);
        }

        if (optional($attributes)["user_id"] && optional($attributes)["client_id"]) {
            optional(optional(User::find($attributes["user_id"]))->clients())->attach($attributes["client_id"]);
        }
    }
}
