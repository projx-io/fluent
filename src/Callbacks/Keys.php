<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Keys extends Method
{
    public function __invoke($items = [])
    {
        return array_keys($items);
    }
}
