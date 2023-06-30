<?php

namespace App\Http\Livewire\Admin\Calendar;

use App\Http\Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;

use Carbon\Carbon;
// Models

class Index extends Component
{
    public $testing = true;
    public $week_starts = "monday";

    public $selected = null;
    public $selected_week = null;

    public $show_monthly = false;
    public $show_organization = false;

    public $syncing = false;

    public $team = [
        [
            "duration" => 60,
            "start" => 9,
            "end" => 17,
        ],
        [
            "duration" => 60,
            "start" => 8,
            "end" => 16,
        ],
        [
            "duration" => 45,
            "start" => 9,
            "end" => 19,
        ],
    ];

    public function mount()
    {
        $this->selected = now();
        $this->selected_week =
            now()
                ->startOfWeek()
                ->format("Ymd") .
            "-" .
            now()
                ->endOfWeek()
                ->format("Ymd");
    }

    public function render()
    {
        // sleep(10);
        return view("pages.admin.calendar.index")->layout("components.layout");
    }

    public function forward()
    {
        $this->selected = (new Carbon($this->selected))->addMonth(1);
        $this->selected_week =
            $this->selected
                ->copy()
                ->startOfWeek()
                ->format("Ymd") .
            "-" .
            $this->selected
                ->copy()
                ->endOfWeek()
                ->format("Ymd");
    }
    public function backward()
    {
        $this->selected = (new Carbon($this->selected))->subMonth(1);
        $this->selected_week =
            $this->selected
                ->copy()
                ->startOfWeek()
                ->format("Ymd") .
            "-" .
            $this->selected
                ->copy()
                ->endOfWeek()
                ->format("Ymd");
    }

    public function calendar()
    {
        $date = Carbon::createFromDate($this->selected->year, $this->selected->month, 1);
        $calendar = [];

        switch ($this->week_starts) {
            case "monday":
                $start_of_week = $date->startOfWeek(Carbon::MONDAY);
                break;
            case "tuesday":
                $start_of_week = $date->startOfWeek(Carbon::TUESDAY);
                break;
            case "wednesday":
                $start_of_week = $date->startOfWeek(Carbon::WEDNESDAY);
                break;
            case "thursday":
                $start_of_week = $date->startOfWeek(Carbon::THURSDAY);
                break;
            case "friday":
                $start_of_week = $date->startOfWeek(Carbon::FRIDAY);
                break;
            case "saturday":
                $start_of_week = $date->startOfWeek(Carbon::SATURDAY);
                break;
            case "sunday":
                $start_of_week = $date->startOfWeek(Carbon::SUNDAY);
                break;
        }

        do {
            //loops through each week
            for ($i = 0; $i < 7; $i++) {
                $calendar[] = [
                    "date" => new Carbon($date),
                    "unavailable" => $date->isSaturday() || $date->isSunday() ? true : false,
                    "has_events" => false,
                ];

                $date->addDay();
            }
        } while ($date->month == $this->selected->month);

        while (count($calendar) < 42) {
            $calendar[] = [
                "date" => new Carbon($date),
                "unavailable" => $date->isSaturday() || $date->isSunday() ? true : false,
                "has_events" => false,
            ];
            $date->addDay();
        }

        return $calendar;
    }

    public function start_sync($force = false)
    {
        auth()
            ->guard("admin")
            ->user()
            ->calendars()
            ->first()
            ->sync()
            ->refreshWatching();
    }
}
