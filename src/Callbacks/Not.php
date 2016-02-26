<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Not extends Method
{
    public function __invoke($value)
    {
        return !$value;
    }
}
