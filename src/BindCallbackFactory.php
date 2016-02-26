<?php

namespace ProjxIO\Fluent;

use ProjxIO\Fluent\Callbacks\BindArray;

class BindCallbackFactory implements CallbackFactory
{
    /**
     * @var CallbackFactory
     */
    private $callback;

    /**
     *
     * @param CallbackFactory $factory
     */
    public function __construct(CallbackFactory $factory)
    {
        $this->callback = $factory;
    }

    /**
     * @inheritDoc
     */
    public function make(array $params = [])
    {
        $callback = $this->callback->make();
        return count($params) ? new BindArray($callback, $params) : $callback;
    }
}
