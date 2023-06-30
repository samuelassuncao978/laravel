<?php

namespace App\Traits\Livewire;

// Traits
use App\Traits\Injectable;

trait Invoker
{
    use Injectable;

    public function invocation($invocation)
    {
        $invocation["parameters"] = $this->injectable()->encode($invocation["parameters"]);
        $invocation["action"] = base64_encode($invocation["action"]);
        return "invoker" . "('" . base64_encode(json_encode($invocation)) . "')";
    }

    public function invoker($invocation = "")
    {
        $invocation = json_decode(base64_decode($invocation));
        $method = array_reduce(
            explode(".", $invocation->method),
            function ($obj, $method) use ($invocation) {
                return $obj->$method(base64_decode($invocation->action), $this->injectable()->decode($invocation->parameters));
            },
            $this
        );
    }
}
