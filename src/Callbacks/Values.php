<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Values extends Method
{
    public function __invoke($items = [])
    {
        return array_values($items);
    }
}
