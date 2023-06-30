<?php

namespace App\Http\Livewire\Admin\Calendar;

use App\Http\Livewire\Component;

// Models
use App\Models\Calendar;

// Traits
use App\Traits\Livewire\Modal;

class FailureDetails extends Component
{
    use Modal;

    public Calendar $calendar;

    public $rules = [];

    public function render()
    {
        return view("segments.admin.calendar.failure-details");
    }

    public function save()
    {
        $this->close();
    }
}
