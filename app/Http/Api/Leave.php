<?php

namespace App\Http\Api;

use App\Http\Api\BaseResource;

// Models
use App\Models\Leave as LeaveModel;
use App\Models\User;

/**
 * @group Leave
 *
 * APIs for managing leave
 */
class Leave extends BaseResource
{
    protected $model = LeaveModel::class;

    protected function performStore($request, $leave, array $attributes): void
    {
        $leave->fill($attributes);
        $leave->save();

        if (optional($attributes)["user_id"]) {
            $leave->users()->attach($attributes["user_id"]);
        }
    }
}
