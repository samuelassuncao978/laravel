<?php

namespace App\Http\Livewire\Admin\Intergrations;

use App\Http\Livewire\Component;
use Illuminate\Http\Request;
use App\Traits\Livewire\Modal;

// Models
use App\Models\Intergration;

class Edit extends Component
{
    use Modal;

    public Intergration $intergration;

    public $rules = [
        "intergration.manifest" => "json",
    ];

    public $manifest = "";

    public function render()
    {
        return view("segments.admin.intergrations.edit");
    }

    public function save()
    {
        $this->authorize("update", $this->intergration);

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
