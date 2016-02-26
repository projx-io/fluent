<?php

use ProjxIO\Stream\Fluent;
use ProjxIO\Stream\Stream;

if (!function_exists('fluent')) {
    /**
     * @param null $value
     * @return Stream
     */
    function fluent($value = null)
    {
        $stream = Fluent::stream();

        if (func_num_args() > 0) {
            $stream = $stream->thenp($stream->value(), func_get_args());
        }

        return $stream;
    }
}

if (!function_exists('F')) {
    /**
     * @param null $value
     * @return Stream
     */
    function F($value = null)
    {
        $stream = Fluent::stream();

        if (func_num_args() > 0) {
            $stream = $stream->thenp($stream->value(), func_get_args());
        }

        return $stream;
    }
}
