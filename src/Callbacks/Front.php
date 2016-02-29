<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Front extends Method
{
    public function __invoke($count, $array = [])
    {
        return array_slice($array, 0, $count);
    }
}
