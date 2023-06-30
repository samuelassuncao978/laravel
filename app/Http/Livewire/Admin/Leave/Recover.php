<?php

namespace App\Http\Livewire\Admin\Leave;

use App\Http\Livewire\Component;
use Illuminate\Http\Request;
use App\Traits\Livewire\Modal;

// Models
use App\Models\Leave;

class Recover extends Component
{
    use Modal;

    public Leave $leave;

    public $rules = [];

    public function render()
    {
        return view("segments.admin.leave.recover");
    }

    public function save()
    {
        $this->authorize("restore", $this->leave);

        $this->leave->restore();
        $this->close();
    }
}
