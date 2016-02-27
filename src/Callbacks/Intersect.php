<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Intersect extends Method
{
    public function __invoke(... $params)
    {
        return call_user_func_array('array_intersect', array_reverse($params));
    }
}
