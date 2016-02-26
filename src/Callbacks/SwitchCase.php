<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class SwitchCase extends Method
{
    const DEFAULT_KEY = '__defualt__';

    public function __invoke(callable $callback, $cases = [])
    {
        $args = array_slice(func_get_args(), 2);
        $key = call_user_func_array($callback, $args);
        if (array_key_exists($key, $cases)) {
            return call_user_func_array($cases[$key], $args);
        }
        $key = self::DEFAULT_KEY;
        if (array_key_exists($key, $cases)) {
            return call_user_func_array($cases[$key], $args);
        }
        return null;
    }
}
