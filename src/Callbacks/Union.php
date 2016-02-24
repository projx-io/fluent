<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class Union extends Method
{
    public function __invoke()
    {
        return array_unique(call_user_func_array('array_merge', array_reverse(func_get_args())));
    }
}
