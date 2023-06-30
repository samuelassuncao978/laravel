<?php

namespace App\Http\Livewire\Admin\Homework;

// Illuminate
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Livewire\Component;

// Models
use App\Models\Homework;
use App\Models\File;

// Jobs
use App\Jobs\GenerateFilePreview;

// Traits
use App\Traits\Livewire\Modal;

class Edit extends Component
{
    use Modal;

    public Homework $homework;

    public File $file;

    public File $image;

    public $rules = [
        "homework.name" => "string",
        "homework.icon" => "string",
        "homework.category" => "string",
        "file.name" => "nullable",
        "file.size" => "nullable",
        "file.mime" => "nullable",
        "file.id" => "uuid",
        "image.name" => "nullable",
        "image.size" => "nullable",
        "image.mime" => "nullable",
        "image.id" => "uuid",
    ];

    public function render()
    {
        return view("segments.admin.homework.edit");
    }

    public function mount()
    {
        $this->file = new File();
        $this->image = new File();
    }

    public function save()
    {
        $this->homework->save();

        if ($this->file->id && $this->store_file()) {
            $this->file->save();
            GenerateFilePreview::dispatch($this->file);
            $this->homework->files()->sync($this->file->id);
        }

        if ($this->image->id && $this->store_image()) {
            $this->image->save();
            $this->homework->images()->sync($this->image->id);
        }

        $this->close();
    }

    public function store_file()
    {
        if (
            Storage::size("tmp/" . $this->file->id) >
            auth()
                ->user()
                ->storage()["available"]
        ) {
            $this->addError("server-error", "You have ran out of enought storage space to store this file.");
        } else {
            if (Storage::copy("tmp/" . $this->file->id, "public/" . $this->file->id)) {
                return true;
            } else {
                abort(500);
            }
            return false;
        }
    }

    public function store_image()
    {
        if (
            Storage::size("tmp/" . $this->image->id) >
            auth()
                ->user()
                ->storage()["available"]
        ) {
            $this->addError("server-error", "You have ran out of enought storage space to store this file.");
        } else {
            if (Storage::copy("tmp/" . $this->image->id, "public/" . $this->image->id)) {
                return true;
            } else {
                abort(500);
            }
            return false;
        }
    }
}
