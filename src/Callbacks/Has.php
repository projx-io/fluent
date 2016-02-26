<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Has extends Method
{
    public function __invoke($keys = [], $value)
    {
        foreach ((array)$keys as $key) {
            if (is_array($value)) {
                if (!array_key_exists($key, $value)) {
                    return false;
                } else {
                    $value = $value[$key];
                }
            } elseif (is_object($value)) {
                if (!array_key_exists($key, (array)$value)) {
                    return false;
                } else {
                    $value = $value->{$key};
                }
            } else {
                return false;
            }
        }

        return true;
    }
}
