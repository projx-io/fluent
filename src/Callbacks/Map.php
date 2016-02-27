<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Map extends Method
{
    public function __invoke(callable $callback, $items = [], ... $params)
    {
        $result = [];

        foreach ($items as $key => $value) {
            $args = array_merge($params, [$value, $key]);
            $result[$key] = call_user_func_array($callback, $args);
        }

        return $result;
    }
}
