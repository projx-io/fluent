<?php

namespace ProjxIO\Fluent;

interface StreamFactory
{
    /**
     * @return Stream
     */
    public function makeStream();
}
