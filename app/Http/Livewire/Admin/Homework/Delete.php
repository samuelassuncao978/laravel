<?php

namespace App\Http\Livewire\Admin\Homework;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\Homework;

// Traits
use App\Traits\Livewire\Modal;

class Delete extends Component
{
    use Modal;

    public Homework $homework;

    public $rules = [];

    public function render()
    {
        return view("segments.admin.homework.delete");
    }

    public function save()
    {
        $this->homework->delete();
        $this->close();
    }
}
