<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class First extends Method
{
    public function __invoke($array = [])
    {
        return array_shift($array);
    }
}
