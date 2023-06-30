<?php

namespace App\Http\Livewire\Admin\Calendar;

// Illuminate
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Livewire\Component;

// Traits
use App\Traits\Livewire\Modal;

class Promotion extends Component
{
    use Modal;

    public $show = false;
    public $syncing = false;

    public function mount()
    {
        $this->show =
            auth()
                ->guard("admin")
                ->user()
                ->calendars()
                ->count() > 0
                ? false
                : true;
    }

    public function render()
    {
        return view("segments.admin.calendar.promotion");
    }

    public function skip()
    {
        $this->show = false;
    }

    public function save()
    {
        $this->show = false;
    }
}
