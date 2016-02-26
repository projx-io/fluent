<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Length extends Method
{
    public function __invoke($items = [])
    {
        return count($items);
    }
}
