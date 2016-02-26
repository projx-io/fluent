<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Times extends Method
{
    public function __invoke($a, $b)
    {
        return $b * $a;
    }
}
