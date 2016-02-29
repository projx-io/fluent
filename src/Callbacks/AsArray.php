<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class AsArray extends Method
{
    public function __invoke($value)
    {
        return (array)$value;
    }
}
