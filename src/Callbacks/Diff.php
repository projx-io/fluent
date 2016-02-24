<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class Diff extends Method
{
    public function __invoke()
    {
        return call_user_func_array('array_diff', array_reverse(func_get_args()));
    }
}
