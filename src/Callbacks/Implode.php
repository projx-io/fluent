<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Implode extends Method
{
    public function __invoke($glue = '', $items = [])
    {
        return implode($glue, $items);
    }
}
