<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class ArrayMaker extends Method
{
    public function __invoke($callbacks = [], $value)
    {
        $array = [];

        foreach ($callbacks as $key => $callback) {
            $args = array_slice(func_get_args(), 2);
            array_unshift($args, $value, $key);
            $array[$key] = call_user_func_array($callback, $args);
        }

        return $array;
    }
}
