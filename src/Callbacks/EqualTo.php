<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class EqualTo extends Method
{
    public function __invoke($expect, $actual)
    {
        return $actual === $expect;
    }
}
