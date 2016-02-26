<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class GetField extends Method
{
    public function __invoke($key, $value)
    {
        return $value->{$key};
    }
}
