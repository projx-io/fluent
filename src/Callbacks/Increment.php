<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class Increment extends Method
{
    public function __invoke(&$value)
    {
        $value++;
    }
}
