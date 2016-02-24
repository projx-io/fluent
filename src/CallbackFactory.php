<?php

namespace ProjxIO\Stream;

interface CallbackFactory
{
    /**
     * @param array $params
     * @return callable
     */
    public function make(array $params = []);
}
