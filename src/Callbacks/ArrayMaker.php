<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class ArrayMaker extends Method
{
    public function __invoke($callbacks = [], $value, ... $params)
    {
        $array = [];

        foreach ($callbacks as $key => $callback) {
            $args = $params;
            array_unshift($args, $value, $key);
            $array[$key] = call_user_func_array($callback, $args);
        }

        return $array;
    }
}
