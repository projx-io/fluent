<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Union extends Method
{
    public function __invoke(... $params)
    {
        return array_unique(call_user_func_array('array_merge', array_reverse($params)));
    }
}
