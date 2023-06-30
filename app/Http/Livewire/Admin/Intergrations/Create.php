<?php

namespace App\Http\Livewire\Admin\Intergrations;

use App\Http\Livewire\Component;
use JsonSchema\Validator;

// Models
use App\Models\Intergration;

// Traits
use App\Traits\Livewire\Modal;

class Create extends Component
{
    use Modal;

    public Intergration $intergration;

    public $rules = [
        "intergration.manifest" => "json",
    ];

    public $manifest = "";

    public function mount()
    {
        $this->intergration = new Intergration();
    }

    public function render()
    {
        return view("segments.admin.intergrations.create");
    }

    public function save()
    {
        $this->authorize("create", $this->intergration);

        $rules = (object) json_decode(file_get_contents(public_path("/schemas/intergration.schema.json")));

        $manifest_validator = new Validator();
        $manifest = json_decode($this->manifest);

        $manifest_validator->validate($manifest, $rules);

        if (!$manifest_validator->isValid()) {
            $this->addError("server-error", $manifest_validator->getErrors()[0]["message"]);
            return false;
            foreach ($manifest_validator->getErrors() as $error) {
            }
        }

        $this->intergration->manifest = $manifest;
        $this->intergration->save();

        $this->close();
    }
}
