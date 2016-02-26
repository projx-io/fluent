<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

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
