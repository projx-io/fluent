<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class AtMost extends Method
{
    public function __invoke($expect, $actual)
    {
        return $actual <= $expect;
    }
}
