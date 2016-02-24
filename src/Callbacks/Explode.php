<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class Explode extends Method
{
    public function __invoke($pattern = '', $items = [])
    {
        return explode($pattern, $items);
    }
}
