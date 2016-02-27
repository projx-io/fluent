<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class IfMaker extends Method
{
    public function __invoke($condition, $true, $false, ... $params)
    {
        return call_user_func_array($condition, $params)
            ? call_user_func_array($true, $params)
            : call_user_func_array($false, $params);
    }
}
