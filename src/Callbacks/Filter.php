<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Filter extends Method
{
    public function __invoke(callable $callback, $items = [], ... $params)
    {
        $result = [];

        foreach ($items as $key => $value) {
            $args = array_merge($params, [$value, $key]);
            if (call_user_func_array($callback, $args)) {
                $result[$key] = $value;
            }
        }

        return $result;
    }
}
