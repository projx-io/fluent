<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class IfMaker extends Method
{
    public function __invoke($condition, $true, $false)
    {
        $args = array_slice(func_get_args(), 3);

        return call_user_func_array($condition, $args)
            ? call_user_func_array($true, $args)
            : call_user_func_array($false, $args);
    }
}
