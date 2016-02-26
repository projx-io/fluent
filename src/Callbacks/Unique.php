<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Unique extends Method
{
    public function __invoke($items = [])
    {
        return array_unique($items);
    }
}
