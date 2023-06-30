<?php

namespace App\Http\Livewire\Common;

use App\Http\Livewire\Component;

use Illuminate\Http\Request;

// Models

class ScopeWithheld extends Component
{
    public $withheld;

    public function mount()
    {
        $this->withheld = session()->get("withdeld");
    }

    public function render()
    {
        return view("segments.common.scope-withheld");
    }

    public function updatedWithheld()
    {
        session()->put("withdeld", $this->withheld);
        $this->emit("refresh");
    }

    public function save()
    {
        $this->close();
    }
}
