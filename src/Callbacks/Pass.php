<?php

namespace ProjxIO\Stream\Callbacks;

use Exception;
use ProjxIO\Stream\Method;

class Pass extends Method
{
    public function __invoke()
    {
        return func_get_arg(0);
    }
}
