<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class ToString extends Method
{
    public function __invoke($value)
    {
        return (string)$value;
    }
}
