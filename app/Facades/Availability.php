<?php

namespace App\Facades;

use Illuminate\Support\Carbon;

use App\Models\User;

class Availability
{
    public $schedule;
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->schedule = (object) [
            "sunday" => (object) ["from" => null, "to" => null],
            "monday" => (object) ["from" => 9, "to" => 17],
            "tuesday" => (object) ["from" => 7, "to" => 19],
            "wednesday" => (object) ["from" => 11, "to" => 14],
            "thursday" => (object) ["from" => 8, "to" => 16],
            "friday" => (object) ["from" => 9, "to" => 17],
            "saturday" => (object) ["from" => null, "to" => null],
        ];
    }

    public function day(Carbon $date)
    {
        $schedule = $this->schedule->{strtolower($date->englishDayOfWeek)};

        return (object) [
            "start" => $schedule->from,
            "end" => $schedule->to,
            "working_hours" => ($schedule->to ?? 0) - ($schedule->from ?? 0),
        ];

        $hours_you_work = ($schedule->to ?? 0) - ($schedule->from ?? 0);
        $hours_before_you_start = 0 + ($schedule->from ?? 0);
        $hours_after_you_finish = 24 - ($schedule->to ?? 0);
        $percentage_after_you_finish = ($hours_after_you_finish / 24) * 100;
        $percentage_before_you_start = ($hours_before_you_start / 24) * 100;
        $percentage_you_work = ($hours_you_work / 24) * 100;

        dd($schedule);
    }

    public function week(Carbon $start)
    {
        $week = collect([]);
        for ($day = 0; $day < 7; $day++) {
            $date = $start->copy()->add($day, "days");
            $week->push($this->day($date));
        }
        return $this->visualize($week);
    }

    public function visualize($range)
    {
        $appointments = $this->user->appointments;

        $first_appointment = optional($this->user->appointments->pluck("start_at")->min())->hour;
        $last_appointment = optional(optional($this->user->appointments->pluck("end_at")->max())->add(1, "hour"))->hour;

        $range_starts_at = min([$range->pluck("start")->min(), $first_appointment]);
        $range_ends_at = max([$range->pluck("end")->max(), $last_appointment]);

        foreach ($range as &$day) {
            $day->hours_before_you_start = ($day->start ?? 0) - $range_starts_at;
            $day->hours_after_you_finish = $range_ends_at - ($day->end ?? 0);
            $day->percentage_before_you_start = ($day->hours_before_you_start / ($range_ends_at - $range_starts_at)) * 100;
            $day->percentage_after_you_finish = ($day->hours_after_you_finish / ($range_ends_at - $range_starts_at)) * 100;
            $day->percentage_you_work = ($day->working_hours / ($range_ends_at - $range_starts_at)) * 100;
            $day->check = $day->percentage_before_you_start + $day->percentage_after_you_finish + $day->percentage_you_work;
        }
        return $range;
    }
}
