<?php

namespace ProjxIO\Stream;

/**
 * @method __invoke
 */
interface Callback
{
    /**
     * @param null $param1
     * @param null $param2
     * @return mixed
     */
    public function call($param1 = null, $param2 = null);

    /**
     * @param array $params
     * @return mixed
     */
    public function apply(array $params = []);
}
