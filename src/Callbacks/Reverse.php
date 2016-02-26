<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Reverse extends Method
{
    public function __invoke($items = [])
    {
        return array_reverse($items, true);
    }
}
