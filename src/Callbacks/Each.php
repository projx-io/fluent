<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class Each extends Method
{
    public function __invoke(callable $callback, $items = [])
    {
        foreach ($items as $key => $value) {
            call_user_func($callback, $value, $key);
        }

        return $items;
    }
}
