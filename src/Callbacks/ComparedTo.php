<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class ComparedTo extends Method
{
    public function __invoke($expect, $actual)
    {
        return $actual < $expect ? 1 : ($actual > $expect ? -1 : 0);
    }
}
