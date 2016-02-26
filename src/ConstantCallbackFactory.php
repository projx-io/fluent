<?php

namespace ProjxIO\Fluent;

class ConstantCallbackFactory implements CallbackFactory
{
    /**
     * @var callable
     */
    private $callback;

    /**
     *
     * @param callable $callback
     */
    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    /**
     * @inheritDoc
     */
    public function make(array $params = [])
    {
        return $this->callback;
    }
}
