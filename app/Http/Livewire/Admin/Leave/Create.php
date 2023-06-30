<?php

namespace App\Http\Livewire\Admin\Leave;

use App\Http\Livewire\Component;

use Illuminate\Http\Request;

use App\Traits\Livewire\Modal;

// Models
use App\Models\Leave;

class Create extends Component
{
    use Modal;

    public Leave $leave;

    public $rules = [
        "leave.description" => "string",
        "leave.start_at" => "datetime",
        "leave.end_at" => "datetime",
    ];

    public function mount()
    {
        $this->leave = new Leave();
    }

    public function render()
    {
        return view("segments.admin.leave.create");
    }

    public function save()
    {
        $this->authorize("create", $this->leave);

        $this->leave->save();
        $this->close();
    }
}
