<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Ands extends Method
{
    public function __invoke($callbacks = [], ... $params)
    {
        foreach ($callbacks as $callback) {
            if (!call_user_func_array($callback, $params)) {
                return false;
            }
        }

        return true;
    }
}
