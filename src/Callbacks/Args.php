<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Args extends Method
{
    public function __invoke()
    {
        return func_get_args();
    }
}
