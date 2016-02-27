<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class SwitchCase extends Method
{
    const DEFAULT_KEY = '__defualt__';

    public function __invoke(callable $callback, $cases = [], ... $params)
    {
        $key = call_user_func_array($callback, $params);
        if (array_key_exists($key, $cases)) {
            return call_user_func_array($cases[$key], $params);
        }
        $key = self::DEFAULT_KEY;
        if (array_key_exists($key, $cases)) {
            return call_user_func_array($cases[$key], $params);
        }
        return null;
    }
}
