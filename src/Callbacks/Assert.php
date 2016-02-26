<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\AssertionException;
use ProjxIO\Fluent\Method;

class Assert extends Method
{
    public function __invoke(callable $callback, $value)
    {
        if (!call_user_func_array($callback, array_slice(func_get_args(), 1))) {
            throw new AssertionException(sprintf('assertion failed. value was %s.', $value));
        }

        return $value;
    }
}
