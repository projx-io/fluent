<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class DividedBy extends Method
{
    public function __invoke($a, $b)
    {
        return $b / $a;
    }
}
