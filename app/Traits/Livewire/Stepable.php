<?php

namespace App\Traits\Livewire;

// Traits
use App\Traits\Injectable;
use App\Traits\Livewire\Invoker;

trait Stepable
{
    use Invoker;

    public $_steps = [];

    public function steps()
    {
        return new _Stepable($this);
    }
}

class _Stepable
{
    use Injectable;

    public $parent;
    public $current = null;

    public function __construct($parent)
    {
        $this->parent = $parent;
        $this->current = array_search("active", $this->parent->_steps);
        $this->completed = array_keys(
            array_filter($this->parent->_steps, function ($i) {
                return $i === "complete";
            })
        );
    }

    public function next()
    {
        $keys = array_keys($this->parent->_steps);
        $current = array_search($this->current, $keys);
        $next = $keys[($current === false ? -1 : $current) + 1] ?: $keys[0];

        for ($i = 0; $i <= $current; $i++) {
            $this->parent->_steps[$keys[$i]] = "complete";
        }

        for ($i = $current + 1; $i < count($keys); $i++) {
            $this->parent->_steps[$keys[$i]] = null;
        }
        $this->parent->_steps[$next] = "active";
        $this->current = array_search("active", $this->parent->_steps);
        $this->completed = array_keys(
            array_filter($this->parent->_steps, function ($i) {
                return $i === "complete";
            })
        );
    }

    public function has_previous()
    {
        $keys = array_keys($this->parent->_steps);
        $current = array_search($this->current, $keys);
        if ($current > 0) {
            return true;
        }
        return false;
    }
    public function has_next()
    {
        $keys = array_keys($this->parent->_steps);
        $current = array_search($this->current, $keys);
        if ($current !== count($keys) - 1) {
            return true;
        }
        return false;
    }

    public function prev()
    {
        $keys = array_keys($this->parent->_steps);
        $current = array_search($this->current, $keys);
        $prev = $keys[($current === false ? -1 : $current) - 1] ?: $keys[0];

        for ($i = 0; $i <= $prev; $i++) {
            $this->parent->_steps[$keys[$i]] = "complete";
        }

        for ($i = $current + 1; $i < count($keys); $i++) {
            $this->parent->_steps[$keys[$i]] = null;
        }
        $this->parent->_steps[$prev] = "active";
        $this->current = array_search("active", $this->parent->_steps);
        $this->completed = array_keys(
            array_filter($this->parent->_steps, function ($i) {
                return $i === "complete";
            })
        );
    }

    public function loads($class = "", $injectables = [])
    {
        return $this->parent->invocation([
            "method" => $class === "next" ? "steps.next" : "steps.prev",
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
        $this->parent->reset("_steps");
    }
}
