<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class AtMost extends Method
{
    public function __invoke($expect, $actual)
    {
        return $actual <= $expect;
    }
}
