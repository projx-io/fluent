<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class Map extends Method
{
    public function __invoke(callable $callback, $items = [])
    {
        $result = [];

        foreach ($items as $key => $value) {
            $args = array_merge(array_slice(func_get_args(), 2), [$value, $key]);
            $result[$key] = call_user_func_array($callback, $args);
        }

        return $result;
    }
}
