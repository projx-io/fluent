<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class OrMaker extends Method
{
    public function __invoke($a, $b)
    {
        return $a || $b;
    }
}
