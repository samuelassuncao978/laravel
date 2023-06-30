<?php

namespace App\Facades;

use Illuminate\Support\Carbon;

class Timezone
{
    public function timezone()
    {
        if (session()->get("timezone")) {
            return session()->get("timezone");
        } elseif (
            optional(
                auth()
                    ->guard("admin")
                    ->user()
            )->timezone
        ) {
            return optional(
                auth()
                    ->guard("admin")
                    ->user()
            )->timezone;
        } else {
            return "Australia/Sydney";
        }
    }

    public function local($date)
    {
        $local = (new Carbon($date))->setTimeZone($this->timezone())->format("Y-m-d H:i:s");
        return Carbon::createFromFormat("Y-m-d H:i:s", $local);
    }

    public function utc($date)
    {
        $global = (new Carbon($date))
            ->shiftTimezone($this->timezone())
            ->setTimezone("UTC")
            ->format("Y-m-d H:i:s");
        return Carbon::createFromFormat("Y-m-d H:i:s", $global);

        return (new Carbon($date))->setTimeZone("UTC");
    }
}
