<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Http\Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view("pages.admin.dashboard.index")->layout("components.layout");
    }
}
