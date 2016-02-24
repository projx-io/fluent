<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class Sort extends Method
{
    public function __invoke(callable $callback, $items = [])
    {
        uasort($items, $callback);

        return $items;
    }
}
