<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class ComparedTo extends Method
{
    public function __invoke($expect, $actual)
    {
        return $actual < $expect ? 1 : ($actual > $expect ? -1 : 0);
    }
}
