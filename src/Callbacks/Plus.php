<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Plus extends Method
{
    public function __invoke($a, $b)
    {
        return $b + $a;
    }
}
