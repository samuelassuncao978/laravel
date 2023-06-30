<?php

namespace App\Plans;

use App\Models\User;

class Free
{
    public $public = true;

    public $name = "Pay as you go";
    public $description = "Charged per booking.";
    public $amount = 250;
    public $frequency = "per appt.";

    public $calculates = "monthly";
    public $bills = "monthly";

    public static function calculation()
    {
        $users = User::count();

        return [
            [
                "qty" => $users,
                "cost" => 500,
                "subtotal" => $users * 500,
                "description" => "Daily users",
            ],
        ];
    }
}
