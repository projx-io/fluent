<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class LessThan extends Method
{
    public function __invoke($expect, $actual)
    {
        return $actual < $expect;
    }
}
