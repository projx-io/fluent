<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Group extends Method
{
    public function __invoke(callable $callback, $items = [], ... $params)
    {
        $groups = [];

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
