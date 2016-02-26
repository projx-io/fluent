<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class Group extends Method
{
    public function __invoke(callable $callback, $items = [])
    {
        $groups = [];

        foreach ($items as $key => $value) {
            $args = array_merge(array_slice(func_get_args(), 2), [$value, $key]);
            $group = call_user_func_array($callback, $args);

            if (!array_key_exists($group, $groups)) {
                $groups[$group] = [];
            }

            $groups[$group][$key] = $value;
        }

        return $groups;
    }
}
