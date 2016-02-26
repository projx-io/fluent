<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\AssertionException;
use ProjxIO\Stream\Method;

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
