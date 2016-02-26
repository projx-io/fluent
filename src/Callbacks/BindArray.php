<?php

namespace ProjxIO\Fluent\Callbacks;

class BindArray
{
    /**
     * @var callable
     */
    private $callback;
    /**
     * @var array
     */
    private $params;

    /**
     *
     * @param callable $callback
     * @param array $params
     */
    public function __construct(callable $callback, array $params = [])
    {
        $this->callback = $callback;
        $this->params = $params;
    }

    public function __invoke()
    {
        return call_user_func_array($this->callback, array_merge($this->params, func_get_args()));
    }
}