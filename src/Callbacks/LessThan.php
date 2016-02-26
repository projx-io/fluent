<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class LessThan extends Method
{
    public function __invoke($expect, $actual)
    {
        return $actual < $expect;
    }
}
