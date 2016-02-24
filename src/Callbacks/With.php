<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class With extends Method
{
    public function __invoke($value = null)
    {
        return $value;
    }
}
