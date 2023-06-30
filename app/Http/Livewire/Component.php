<?php

namespace App\Http\Livewire;

use Livewire\Component as LivewireComponent;

use App\Traits\Livewire\Injectable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Component extends LivewireComponent
{
    use Injectable, AuthorizesRequests;

    public $actions = [];

    public $form = [];

    public function refresh()
    {
        $this->render();
    }

    // public $_tab = '';

    protected $listeners = [
        "refresh" => "refresh",
        "cancel" => "action_cancel",
        "complete" => "action_complete",
    ];

    // public function tab($tab){
    //     return ($tab === $this->_tab ? true : false );
    // }

    public function goto($tab)
    {
        $this->_tab = $tab;
    }

    public function action_cancel($action = null)
    {
        $this->actions = collect($this->actions);
        $this->actions->forget($action);
    }
    public function action_complete($action = null)
    {
        $this->actions = collect($this->actions);
        $this->actions->forget($action);
    }

    public function action($action = null)
    {
        $this->actions = collect($this->actions);
        return $this->actions->has($action);
    }

    public function payload($action = null)
    {
        $this->actions = collect($this->actions);
        return $this->actions->pull($action);
    }

    // public function invoke($action = null, $payload = null){
    //     $this->actions = collect($this->actions);

    //     $this->actions->put($action, $payload);

    // }

    // public function opens($model = null, $params = null){
    //     $inject = '';
    //     if($params && is_object($params)){
    //         $name = get_class($params);
    //         $id = $params->id;
    //         $inject = base64_encode("$name@$id");
    //     }else if(is_array($params)){
    //         $payload = [];
    //         foreach($params as $model){
    //             $name = get_class($params);
    //             $id = $params->id;
    //             $payload[] = base64_encode("$name@$id");
    //         }
    //         return "record('".addslashes($model)."','".base64_encode(json_encode($payload))."')";
    //     }

    //     return "invoke('".addslashes($model)."','".$inject."')";
    // }

    public function inject($model = "")
    {
        $this->actions = collect($this->actions);
        $payload = $this->actions->pull($model);
        if (empty($payload)) {
            return null;
        }
        $data = explode("@", base64_decode($payload));
        $m = new $data[0]();

        return $m->find($data[1]);
    }
}
