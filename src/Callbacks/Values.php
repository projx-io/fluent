<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class Values extends Method
{
    public function __invoke($items = [])
    {
        return array_values($items);
    }
}
