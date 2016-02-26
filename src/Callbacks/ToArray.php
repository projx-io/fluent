<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class ToArray extends Method
{
    public function __invoke($value)
    {
        return (array)$value;
    }
}
