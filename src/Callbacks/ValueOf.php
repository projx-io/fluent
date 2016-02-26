<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class ValueOf extends Method
{
    public function __invoke($items = [], $value)
    {
        return array_search($value, $items, true);
    }
}
