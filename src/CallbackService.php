<?php

namespace ProjxIO\Stream;

interface CallbackService
{
    /**
     * @param Stream $parent
     * @param string $key
     * @param array $params
     * @return callable
     */
    public function next(Stream $parent, $key, array $params = []);
}
