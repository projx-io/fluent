<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class Unique extends Method
{
    public function __invoke($items = [])
    {
        return array_unique($items);
    }
}
