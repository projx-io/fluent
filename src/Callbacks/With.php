<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class With extends Method
{
    public function __invoke($value = null)
    {
        return $value;
    }
}
