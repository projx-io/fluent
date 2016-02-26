<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Sort extends Method
{
    public function __invoke(callable $callback, $items = [])
    {
        uasort($items, $callback);

        return $items;
    }
}
