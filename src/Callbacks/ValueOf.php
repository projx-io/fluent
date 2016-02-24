<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class ValueOf extends Method
{
    public function __invoke($items = [], $value)
    {
        return array_search($value, $items, true);
    }
}
