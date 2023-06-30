<?php

namespace App\Http\Livewire\Admin\Calendar;

use App\Http\Livewire\Component;

// Models
use App\Models\Calendar;

// Traits
use App\Traits\Livewire\Modal;

class Disconnect extends Component
{
    use Modal;

    public Calendar $calendar;

    public $rules = [];

    public function render()
    {
        return view("segments.admin.calendar.disconnect");
    }

    public function save()
    {
        /**
         * Stop watching for changes and delete the calendar
         */
        $this->calendar
            ->stopWatching()
            ->forceDelete();
        
        $this->close();
    }
}
