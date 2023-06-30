<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait Injectable
{
    protected $_injectable;

    public function injectable()
    {
        $this->_injectable = $this->_injectable ?? new _Injectable();
        return $this->_injectable;
    }
}

class _Injectable
{
    public function encode($injectables = [])
    {
        $payload = [];
        foreach ($injectables as $name => $parameter) {
            if (is_a($parameter, Model::class)) {
                $classname = get_class($parameter);
                $id = $parameter->id;
                $payload[$name] = base64_encode("Eloquent:$classname@$id");
            } elseif (is_string($parameter)) {
                $payload[$name] = base64_encode("String:$parameter");
            }
        }
        return base64_encode(json_encode($payload));
    }

    public function decode($injectables = "")
    {
        $payload = [];
        $decode = json_decode(base64_decode($injectables));

        if (gettype($decode) === "object") {
            foreach ($decode as $name => $parameter) {
                $decoded_parameter = base64_decode($parameter);
                if (substr($decoded_parameter, 0, 9) === "Eloquent:") {
                    $data = explode("@", str_replace("Eloquent:", "", $decoded_parameter));
                    $class = new $data[0]();
                    $record = $class->find($data[1]);
                    $payload[$name] = $record;
                } elseif (substr($decoded_parameter, 0, 7) === "String:") {
                    $data = str_replace("String:", "", $decoded_parameter);
                    $payload[$name] = $data;
                }
            }
        }
        return $payload;
    }
}
