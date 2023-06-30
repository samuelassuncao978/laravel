<?php

namespace App\Traits\Livewire;

use Illuminate\Database\Eloquent\Model;

trait Injectable
{
    public $bus = [
        "tabs" => [],
        "modals" => [],
    ];

    public $injectables = [];

    public function on($layer = null, $type = "modal")
    {
        $this->bus[$type . "s"] = collect($this->bus[$type . "s"]);
        $this->emit($layer, "");

        return $this->bus[$type . "s"]->has($layer);
    }

    public function invoke($action, $type = "modal", $payload = [])
    {
        $this->bus[$type . "s"] = collect($this->bus[$type . "s"]);
        if ($type === "tab") {
            $this->bus[$type . "s"] = collect([$action => $payload]);
        } else {
            $this->bus[$type . "s"]->put($action, $payload);
        }
    }

    public function parameters($layer = null, $type = "modal")
    {
        $this->bus[$type . "s"] = collect($this->bus[$type . "s"]);
        if ($this->bus[$type . "s"]->has($layer)) {
            $payload = json_decode(base64_decode($this->bus[$type . "s"]->pull($layer)));
            $decoded = [];
            foreach ($payload as $name => $model) {
                $data = explode("@", base64_decode($model));
                $class = new $data[0]();
                try {
                    $record = $class->withTrashed()->find($data[1]);
                } catch (\BadMethodCallException $e) {
                    $record = $class->find($data[1]);
                }

                $decoded[$name] = $record;
            }
            return $decoded;
        }
        return null;
    }

    public function opens($model = null, $injectables = [], $type = "modal")
    {
        $payload = [];
        foreach ($injectables as $name => $parameter) {
            if (is_a($parameter, Model::class)) {
                $classname = get_class($parameter);
                $id = $parameter->id;
                $payload[$name] = base64_encode("$classname@$id");
            } elseif (is_string($parameter)) {
                // Handle later
            }
        }
        return "invoke('" . addslashes($model) . "','" . $type . "','" . base64_encode(json_encode($payload)) . "')";
    }

    public function tabs($layer = null, $injectables = [])
    {
        return $this->opens($layer, $injectables, "tab");
    }
}
