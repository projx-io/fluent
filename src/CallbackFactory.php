<?php

namespace ProjxIO\Fluent;

interface CallbackFactory
{
    /**
     * @param array $params
     * @return callable
     */
    public function make(array $params = []);
}
