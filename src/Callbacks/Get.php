<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class Get extends Method
{
    public function __invoke($keys = [], $value)
    {
        foreach ((array)$keys as $key) {
            $value = $value[$key];
        }
        return $value;
    }
}
