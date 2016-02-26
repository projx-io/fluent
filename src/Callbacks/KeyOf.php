<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class KeyOf extends Method
{
    public function __invoke($items = [], $key)
    {
        return array_key_exists($key, $items);
    }
}
