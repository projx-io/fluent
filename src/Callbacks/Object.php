<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Object extends Method
{
    public function __invoke($callbacks = [], $value)
    {
        $array = [];

        foreach ($callbacks as $key => $callback) {
            $array[$key] = call_user_func($callback, $value, $key);
        }

        return (object)$array;
    }
}
