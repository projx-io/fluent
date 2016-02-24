<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class Keys extends Method
{
    public function __invoke($items = [])
    {
        return array_keys($items);
    }
}
