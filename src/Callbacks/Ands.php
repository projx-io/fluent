<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Ands extends Method
{
    public function __invoke($callbacks = [])
    {
        foreach ($callbacks as $callback) {
            if (!call_user_func_array($callback, array_slice(func_get_args(), 1))) {
                return false;
            }
        }

        return true;
    }
}
