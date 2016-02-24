<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class Length extends Method
{
    public function __invoke($items = [])
    {
        return count($items);
    }
}
