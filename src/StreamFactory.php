<?php

namespace ProjxIO\Stream;

interface StreamFactory
{
    /**
     * @return Stream
     */
    public function makeStream();
}
