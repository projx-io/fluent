<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class ToBoolean extends Method
{
    public function __invoke($value)
    {
        return (boolean)$value;
    }
}
