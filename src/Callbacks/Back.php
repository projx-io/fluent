<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Back extends Method
{
    public function __invoke($count, $array = [])
    {
        return array_slice($array, -$count);
    }
}
