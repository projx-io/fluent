<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class Intersect extends Method
{
    public function __invoke()
    {
        return call_user_func_array('array_intersect', array_reverse(func_get_args()));
    }
}
