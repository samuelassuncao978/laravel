<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Component;
use Illuminate\Http\Request;

class Form extends Component
{
    public $controller = null;
    public $action = null;
    public $set = null;
    public $initial = null;

    public $view = "components.ui.modal.livewire";

    public function mount($set = null, $arguments = null)
    {
        $this->set = (array) json_decode($set ?? "");
        $this->form = array_merge($this->form, $this->set);
    }

    public function render()
    {
        return view($this->view);
    }

    public function save(Request $request)
    {
        [$classname, $method] = explode("@", $this->controller);
        $class = app($classname);
        $request->request->add($this->form);
        try {
            $class->callAction($method, [$request]);
            $this->emitUp("complete", $this->action);
        } catch (Illuminate\Validation\ValidationException $e) {
            foreach ($e->validator->messages()->messages() as $name => $errors) {
                $this->addError($name, optional($errors)[0] ?? "");
            }
        }
    }
}
