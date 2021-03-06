<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class AsInteger extends Method
{
    public function __invoke($value)
    {
        return (integer)$value;
    }
}
