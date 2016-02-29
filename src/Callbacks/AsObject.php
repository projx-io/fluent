<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class AsObject extends Method
{
    public function __invoke($value)
    {
        return (object)$value;
    }
}
