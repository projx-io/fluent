<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Group extends Method
{
    public function __invoke(callable $callback, $items = [])
    {
        $groups = [];
        $params = array_slice(func_get_args(), 2);
        foreach ($items as $key => $value) {
            $args = array_merge($params, [$value, $key]);
            $group = call_user_func_array($callback, $args);

            if (!array_key_exists($group, $groups)) {
                $groups[$group] = [];
            }

            $groups[$group][$key] = $value;
        }

        return $groups;
    }
}
