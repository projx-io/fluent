<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class Times extends Method
{
    public function __invoke($a, $b)
    {
        return $b * $a;
    }
}
