<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class GetField extends Method
{
    public function __invoke($key, $value)
    {
        return $value->{$key};
    }
}
