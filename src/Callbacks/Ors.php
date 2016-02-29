<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Ors extends Method
{
    public function __invoke($callbacks = [])
    {
        $params = array_slice(func_get_args(), 1);
        foreach ($callbacks as $callback) {
            if (call_user_func_array($callback, $params)) {
                return true;
            }
        }

        return false;
    }
}
