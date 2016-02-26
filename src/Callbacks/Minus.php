<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Minus extends Method
{
    public function __invoke($a, $b)
    {
        return $b - $a;
    }
}
