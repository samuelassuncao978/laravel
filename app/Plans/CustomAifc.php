<?php

namespace App\Plans;

use App\Models\User;

class CustomAifc
{
    public $public = false;

    public $name = "AIFC";
    public $description = "AIFC CUSTOM";

    public $calculates = "daily";
    public $bills = "monthly";

    public static function calculation()
    {
        $students = 500;
        $counsellors = 3500;

        $users = User::count();

        return [
            [
                "qty" => $users,
                "cost" => $counsellors,
                "subtotal" => $users * $counsellors,
                "description" => "Providers/Supervisors - " . now()->format("Y-m-d"),
            ],
            [
                "qty" => $users,
                "cost" => $students,
                "subtotal" => $users * $students,
                "description" => "Students - " . now()->format("Y-m-d"),
            ],
        ];
    }
}
