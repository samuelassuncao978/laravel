<?php

namespace App\Traits\Livewire;

// Traits
use App\Traits\Injectable;
use App\Traits\Livewire\Invoker;

trait Tabable
{
    use Invoker;

    public $_tab = ["loaded" => null, "payload" => null];

    public function tab()
    {
        return new _Tabable($this);
    }
}

class _Tabable
{
    use Injectable;

    public $parent;
    public $loaded = null;

    public function __construct($parent)
    {
        $this->parent = $parent;
        $this->loaded = optional($this->parent->_tab)["loaded"];
    }

    public function loads($class = "", $injectables = [])
    {
        return $this->parent->invocation([
            "method" => "tab.load",
            "action" => $class,
            "parameters" => $injectables,
        ]);
    }

    public function parameters($parameter = null)
    {
        $payload = $this->injectable()->decode($this->parent->_tab["payload"]);
        if ($parameter) {
            return optional($payload)[$parameter];
        }
        return $payload;
    }

    public function load($class = "", $injectables = "")
    {
        $this->parent->_tab["loaded"] = $class;
        $this->parent->_tab["payload"] = $this->injectable()->encode($injectables);
    }
    public function forget()
    {
        $this->parent->reset("_tab");
    }
}
