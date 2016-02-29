<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Diff extends Method
{
    public function __invoke(... $params)
    {
        return call_user_func_array('array_diff', array_reverse(func_get_args()));
    }
}
