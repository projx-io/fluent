<?php

namespace ProjxIO\Fluent;

/**
 * @method __invoke
 */
interface Callback
{
    /**
     * @param array ...$params
     * @return mixed
     */
    public function call(... $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function apply(array $params = []);
}
