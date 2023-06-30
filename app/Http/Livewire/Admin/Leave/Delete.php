<?php

namespace App\Http\Livewire\Admin\Leave;

use App\Http\Livewire\Component;
use Illuminate\Http\Request;
use App\Traits\Livewire\Modal;

// Models
use App\Models\Leave;

class Delete extends Component
{
    use Modal;

    public Leave $leave;

    public $rules = [];

    public function render()
    {
        return view("segments.admin.leave.delete");
    }

    public function save()
    {
        $this->authorize("delete", $this->leave);

        $this->leave->delete();
        $this->close();
    }
}
