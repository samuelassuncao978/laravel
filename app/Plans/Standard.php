<?php

namespace App\Plans;

use App\Models\User;

class Standard
{
    public $public = true;
    public $promoted = true;

    public $name = "Standard";
    public $description = "Charged per user per month.";
    public $amount = 3500;
    public $frequency = "mo";

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
