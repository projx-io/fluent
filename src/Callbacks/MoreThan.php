<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class MoreThan extends Method
{
    public function __invoke($expect, $actual)
    {
        return $actual > $expect;
    }
}
