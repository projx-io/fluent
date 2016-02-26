<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Pass extends Method
{
    public function __invoke()
    {
        return func_get_arg(0);
    }
}
