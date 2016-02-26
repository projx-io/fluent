<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class Key extends Method
{
    public function __invoke()
    {
        return func_get_arg(func_num_args() - 1);
    }
}
