<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class Minus extends Method
{
    public function __invoke($a, $b)
    {
        return $b - $a;
    }
}
