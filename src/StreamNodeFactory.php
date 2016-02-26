<?php

namespace ProjxIO\Fluent;

class StreamNodeFactory implements StreamFactory
{
    /**
     * @var array|CallbackFactory[]
     */
    private $methods;

    /**
     *
     * @param CallbackFactory[] $methods
     */
    public function __construct($methods = [])
    {
        $this->methods = $methods;
    }

    /**
     * @inheritDoc
     */
    public function makeStream()
    {
        return new StreamNode(new AssociativeCallbackService($this->methods));
    }
}
