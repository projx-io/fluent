<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class Implode extends Method
{
    public function __invoke($glue = '', $items = [])
    {
        return implode($glue, $items);
    }
}
