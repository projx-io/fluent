<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Key extends Method
{
    public function __invoke()
    {
        return func_get_arg(func_num_args() - 1);
    }
}
