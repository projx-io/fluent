<?php

namespace ProjxIO\Fluent;

/**
 * @method __invoke
 */
interface Callback
{
    /**
     * @return mixed
     */
    public function call();

    /**
     * @param array $params
     * @return mixed
     */
    public function apply(array $params = []);
}
