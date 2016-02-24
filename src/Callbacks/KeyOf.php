<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class KeyOf extends Method
{
    public function __invoke($items = [], $key)
    {
        return array_key_exists($key, $items);
    }
}
