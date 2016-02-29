<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Flatten extends Method
{
    public function __invoke(array $arrays)
    {
        return call_user_func_array('array_merge', $arrays);
    }
}
