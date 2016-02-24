<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class Group extends Method
{
    public function __invoke(callable $callback, $items = [])
    {
        $groups = [];

        foreach ($items as $key => $value) {
            $group = call_user_func($callback, $value, $key);

            if (!array_key_exists($group, $groups)) {
                $groups[$group] = [];
            }

            $groups[$group][$key] = $value;
        }

        return $groups;
    }
}
