<?php

use ProjxIO\Fluent\Fluent;
use ProjxIO\Fluent\Stream;

if (!function_exists('fluent')) {
    /**
     * @param array ...$params
     * @return Stream
     */
    function fluent(... $params)
    {
        return rfluentp($params);
    }
}

if (!function_exists('fluent')) {
    /**
     * @param array ...$params
     * @return Stream
     */
    function fluent(... $params)
    {
        return rfluentp($params);
    }
}

if (!function_exists('fluentp')) {
    /**
     * @param array $params
     * @return Stream
     */
    function fluentp(array $params = [])
    {
        return rfluentp($params);
    }
}

// &...$params is not supported php version<5.6 or hhvm
//if (!function_exists('rfluent')) {
//    /**
//     * @param array ...$params
//     * @return Stream
//     */
//    function rfluent(&...$params)
//    {
//        return rfluentp($params);
//    }
//}

if (!function_exists('rfluentp')) {
    /**
     * @param array $params
     * @return Stream
     */
    function rfluentp(array &$params = [])
    {
        $stream = Fluent::stream();

        if (count($params) > 0) {
            $stream = $stream->thenp($stream->arg(), $params);
        }

        return $stream;
    }
}

if (!function_exists('f')) {
    /**
     * @param array ...$params
     * @return Stream
     */
    function f(... $params)
    {
        return rfluentp($params);
    }
}

if (!function_exists('fp')) {
    /**
     * @param array $params
     * @return Stream
     */
    function fp(array $params = [])
    {
        return rfluentp($params);
    }
}

// &...$params is not supported php version<5.6 or hhvm
//if (!function_exists('rf')) {
//    /**
//     * @param array ...$params
//     * @return Stream
//     */
//    function rf(&... $params)
//    {
//        return rfluentp($params);
//    }
//}

if (!function_exists('rfp')) {
    /**
     * @param array $params
     * @return Stream
     */
    function rfp(array &$params = [])
    {
        return rfluentp($params);
    }
}
