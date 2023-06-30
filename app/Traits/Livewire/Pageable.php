<?php

namespace App\Traits\Livewire;

// Traits
use App\Traits\Injectable;
use App\Traits\Livewire\Invoker;

trait Pageable
{
    use Invoker;

    public $l_pge = ["loaded" => null, "payload" => null];

    public function pge()
    {
        return new _Pageable($this);
    }
}

class _Pageable
{
    use Injectable;

    public $parent;
    public $loaded = null;

    public function __construct($parent)
    {
        $this->parent = $parent;
        $this->loaded = optional($this->parent->l_pge)["loaded"];
    }

    public function loads($class = "", $injectables = [])
    {
        return $this->parent->invocation([
            "method" => "pge.load",
            "action" => $class,
            "parameters" => $injectables,
        ]);
    }

    public function parameters($parameter = null)
    {
        $payload = $this->injectable()->decode($this->parent->l_pge["payload"]);
        if ($parameter) {
            return optional($payload)[$parameter];
        }
        return $payload;
    }

    public function load($class = "", $injectables = "")
    {
        $this->parent->l_pge["loaded"] = $class;
        $this->parent->l_pge["payload"] = $this->injectable()->encode($injectables);
    }
    public function forget()
    {
        $this->parent->reset("l_pge");
    }
}
