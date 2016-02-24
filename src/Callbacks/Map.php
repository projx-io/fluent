<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class Map extends Method
{
    public function __invoke(callable $callback, $items = [])
    {
        $result = [];

        foreach ($items as $key => $value) {
            $result[$key] = call_user_func($callback, $value, $key);
        }

        return $result;
    }
}
