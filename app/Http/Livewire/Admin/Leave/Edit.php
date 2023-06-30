<?php

namespace App\Http\Livewire\Admin\Leave;

use App\Http\Livewire\Component;
use Illuminate\Http\Request;
use App\Traits\Livewire\Modal;

// Models
use App\Models\Leave;

class Edit extends Component
{
    use Modal;

    public Leave $leave;

    public $rules = [
        "leave.description" => "string",
        "leave.start_at" => "datetime",
        "leave.end_at" => "datetime",
    ];

    public function render()
    {
        return view("segments.admin.leave.edit");
    }

    public function save()
    {
        $this->authorize("update", $this->leave);

        $this->leave->save();
        $this->close();
    }
}
