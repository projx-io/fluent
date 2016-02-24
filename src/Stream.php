<?php

namespace ProjxIO\Stream;

interface Stream extends Callback, StreamInstance
{
    /**
     * @param callable $callback
     * @return Stream
     */
    public function then(callable $callback);

    /**
     * @param callable $callback
     * @param array $params
     * @return Stream
     */
    public function thenp(callable $callback, array $params = []);

    /**
     * @return Stream
     */
    public function parent();

    /**
     * @return callable
     */
    public function callback();
}
