<?php

namespace App\Http\Livewire\Admin\Files;

// Illuminate
use Illuminate\Support\Facades\Storage;

use App\Http\Livewire\Component;

// Jobs
use App\Jobs\GenerateFilePreview;

// Models
use App\Models\File;
use App\Models\Client;
use App\Models\Appointment;
use App\Models\User;

// Traits
use App\Traits\Livewire\Modal;

class Create extends Component
{
    use Modal;

    public File $file;
    public ?Client $client = null;
    public ?Appointment $appointment = null;
    public ?User $user = null;

    public $parent;

    public $rules = [
        "file.name" => "required",
        "file.size" => "nullable",
        "file.mime" => "nullable",
        "file.id" => "uuid",
    ];

    public function mount()
    {
        $this->file = new File();
    }

    public function render()
    {
        return view("segments.admin.files.create");
    }

    public function save()
    {
        $mimes = ["image/jpg", "image/jpeg", "image/png", "image/gif", "application/pdf", "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet", "application/vnd.openxmlformats-officedocument.wordprocessingml.document"];

        if (
            Storage::size("tmp/" . $this->file->id) >
            auth()
                ->user()
                ->storage()["available"]
        ) {
            $this->addError("server-error", "You have ran out of enought storage space to store this file.");
        } elseif (!in_array(\GuzzleHttp\Psr7\MimeType::fromFilename($this->file->name), $mimes)) {
            $this->addError("server-error", "This file type is not supported, Please upload a different file.");
        } else {
            if (Storage::copy("tmp/" . $this->file->id, "public/" . $this->file->id)) {
                $this->file->save();
                if ($this->parent) {
                    $this->file->folders()->sync($this->parent);
                }
                if ($this->user) {
                    $this->file->users()->sync($this->user->id);
                }
                if ($this->client) {
                    $this->file->clients()->sync($this->client->id);
                }
                if ($this->appointment) {
                    $this->file->appointments()->sync($this->appointment->id);
                }
            } else {
                abort(500);
            }

            GenerateFilePreview::dispatch($this->file);

            $this->close();
        }
    }
}
