<?php

namespace App\Http\Livewire\Admin\Tags;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\Tag;

// Traits
use App\Traits\Livewire\Modal;

class Delete extends Component
{
    use Modal;

    public Tag $tag;

    public $rules = [];

    public function render()
    {
        return view("segments.admin.tags.delete");
    }

    public function save()
    {
        $this->tag->delete();
        $this->close();
    }
}
