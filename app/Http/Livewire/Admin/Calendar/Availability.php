<?php

namespace App\Http\Livewire\Admin\Calendar;

// Illuminate
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Livewire\Component;

// Models
use App\Models\Client;

// Traits
use App\Traits\Livewire\Modal;

class Availability extends Component
{
    use Modal;

    public $rules = [];

    public function mount()
    {
    }

    public function render()
    {
        return view("segments.admin.calendar.availability");
    }

    public function save()
    {
        $this->close();
    }
}
