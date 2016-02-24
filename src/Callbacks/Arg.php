<?php

namespace ProjxIO\Stream\Callbacks;

use ProjxIO\Stream\Method;

class Arg extends Method
{
    /**
     * @var int
     */
    private $index;

    /**
     *
     * @param int $index
     */
    public function __construct($index = 0)
    {
        $this->index = $index;
    }

    public function __invoke()
    {
        return func_get_arg($this->index);
    }
}
