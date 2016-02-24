<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class Decrement extends Method
{
    public function __invoke(&$value)
    {
        $value--;
    }
}
