<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class Arg extends Method
{
    public function __invoke()
    {
        return func_get_arg(0);
    }
}
