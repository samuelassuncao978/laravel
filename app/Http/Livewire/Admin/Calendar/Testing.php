<?php

namespace App\Http\Livewire\Admin\Calendar;

use App\Http\Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

// Resources
use App\Http\Resources\Calendar\EventCollection;

class Testing extends Component
{
    public $events = [];

    /**
     * Set events
     */
    protected function setEvents(array $range)
    {
        $calendars = auth()
            ->guard("admin")
            ->user()->calendars;

        # Check does the user have at least one calendar
        if ($calendars->isEmpty()) {
            return;
        }

        # Get events that are ready to be displayed
        $this->events = auth()
            ->guard("admin")
            ->user()
            ->calendars()
            ->first()
            ->renderableEvents($range);
    }

    /**
     * Get a default date range
     */
    protected function defaultDateRange()
    {
        return [
            now()
                ->subMonth(12)
                ->toDateString(),
            now()
                ->addMonth(12)
                ->toDateString(),
        ];
    }

    /**
     * Mount
     */
    public function mount(Request $request)
    {
        # Set events
        $this->setEvents($request->input("range", $this->defaultDateRange()));

        # Set a collection of events
        $this->events = (new EventCollection($this->events))->toArray($request);

        $availability = auth()
            ->guard("admin")
            ->user()
            ->appointmentAvailableSlots->map(function ($slot) {
                $slot->name = "available";
                return $slot;
            });

        $this->events = array_merge($this->events, (new EventCollection($availability))->toArray($request));

        # Encode them
        $this->events = json_encode($this->events);
    }

    /**
     * Render
     */
    public function render()
    {
        return view("pages.admin.calendar.testing");
    }
}
