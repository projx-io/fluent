<?php

namespace ProjxIO\Fluent\Callbacks;

class Bind extends BindArray
{
    public function __construct(callable $callback, ... $params)
    {
        parent::__construct($callback, $params);
    }
}