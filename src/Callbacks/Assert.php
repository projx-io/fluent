<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class Assert extends Method
{
    public function __invoke(callable $callback, $value)
    {
        $result = call_user_func_array($callback, array_slice(func_get_args(), 1));
        assert($result);
        return $value;
    }
}
