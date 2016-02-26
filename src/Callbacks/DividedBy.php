<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class DividedBy extends Method
{
    public function __invoke($a, $b)
    {
        return $b / $a;
    }
}
