<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class Filter extends Method
{
    public function __invoke(callable $callback, $items = [])
    {
        $result = [];

        foreach ($items as $key => $value) {
            if (call_user_func($callback, $value, $key)) {
                $result[$key] = $value;
            }
        }

        return $result;
    }
}
