<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class InstanceOfMethod extends Method
{
    public function __invoke($type, $value)
    {
        $method = 'is_' . $type;

        return $value instanceof $type || function_exists($method) && call_user_func($method, $value);
    }
}
