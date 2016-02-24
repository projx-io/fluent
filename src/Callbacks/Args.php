<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class Args extends Method
{
    public function __invoke()
    {
        return func_get_args();
    }
}
