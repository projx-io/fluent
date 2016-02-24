<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class Reverse extends Method
{
    public function __invoke($items = [])
    {
        return array_reverse($items, true);
    }
}
