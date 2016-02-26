<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Increment extends Method
{
    public function __invoke(&$value)
    {
        $value++;
    }
}
