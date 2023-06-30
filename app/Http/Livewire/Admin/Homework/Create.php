<?php

namespace App\Http\Livewire\Admin\Homework;

// Illuminate
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Livewire\Component;

// Models
use App\Models\Homework;
use App\Models\File;
use App\Models\User;

// Jobs
use App\Jobs\GenerateFilePreview;

// Traits
use App\Traits\Livewire\Modal;

class Create extends Component
{
    use Modal;

    public ?User $user = null;
    public Homework $homework;

    public File $file;

    public File $image;

    public $rules = [
        "homework.name" => "string",
        "homework.icon" => "string",
        "homework.category" => "string",
        "file.name" => "required",
        "file.size" => "nullable",
        "file.mime" => "nullable",
        "file.id" => "uuid",
        "image.name" => "required",
        "image.size" => "nullable",
        "image.mime" => "nullable",
        "image.id" => "uuid",
    ];

    public function mount()
    {
        $this->homework = new Homework();
        $this->file = new File();
        $this->image = new File();
    }

    public function render()
    {
        return view("segments.admin.homework.create");
    }

    public function save()
    {
        if ($this->store_file() && $this->store_image()) {
            $this->file->save();
            $this->image->save();
            $this->homework->save();
            $this->homework->files()->sync($this->file->id);
            $this->homework->images()->sync($this->image->id);
            if ($this->user) {
                $this->homework->users()->sync($this->user->id);
            }
            GenerateFilePreview::dispatch($this->file);
            $this->close();
        }
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
