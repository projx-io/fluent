<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class Rename extends Method
{
    public function __invoke(callable $callback, $items = [])
    {
        $result = [];

        foreach ($items as $key => $value) {
            $result[call_user_func($callback, $value, $key)] = $value;
        }

        return $result;
    }
}
