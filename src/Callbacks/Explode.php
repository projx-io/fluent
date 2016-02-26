<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Explode extends Method
{
    public function __invoke($pattern = '', $items = [])
    {
        return explode($pattern, $items);
    }
}
