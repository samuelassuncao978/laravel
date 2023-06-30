<?php

namespace App\Http\Livewire\Admin\Tags;

// Illuminate
use Illuminate\Http\Request;

use App\Http\Livewire\Component;

// Models
use App\Models\Tag;

// Traits
use App\Traits\Livewire\Modal;

class Edit extends Component
{
    use Modal;

    public Tag $tag;

    public $rules = [
        "tag.name" => "string",
        "tag.color" => "string",
    ];

    public function render()
    {
        return view("segments.admin.tags.edit");
    }

    public function save()
    {
        $this->tag->save();
        $this->close();
    }
}
