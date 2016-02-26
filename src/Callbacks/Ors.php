<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Ors extends Method
{
    public function __invoke($callbacks = [])
    {
        $args = array_slice(func_get_args(), 1);

        foreach ($callbacks as $callback) {
            if (call_user_func_array($callback, $args)) {
                return true;
            }
        }

        return false;
    }
}
