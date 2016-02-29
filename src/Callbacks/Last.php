<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Last extends Method
{
    public function __invoke($array = [])
    {
        return array_pop($array);
    }
}
