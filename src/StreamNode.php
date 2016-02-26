<?php

namespace ProjxIO\Fluent;

use ProjxIO\Fluent\Callbacks\BindArray;

class StreamNode implements Stream, \ArrayAccess
{
    /**
     * @var CallbackService
     */
    private $callbackService;

    /**
     * @var callable
     */
    private $callback;

    /**
     * @var Stream
     */
    private $parent;

    /**
     *
     * @param CallbackService $callbackService
     * @param callable $callback
     * @param Stream $parent
     */
    public function __construct(CallbackService $callbackService, callable $callback = null, Stream $parent = null)
    {
        $this->callbackService = $callbackService;
        $this->callback = $callback;
        $this->parent = $parent;
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset)
    {
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($key)
    {
        return $this->callbackService->next($this, 'getElement', [$key]);
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {

    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset)
    {

    }

    public function __get($key)
    {
        return $this->callbackService->next($this, 'getField', [$key]);
    }

    /**
     * @inheritDoc
     */
    function __call($key, $arguments)
    {
        return $this->callbackService->next($this, $key, $arguments);
    }

    /**
     * @inheritDoc
     */
    public function then(callable $callback)
    {
        return $this->thenp($callback, array_slice(func_get_args(), 1));
    }

    /**
     * @inheritDoc
     */
    public function thenp(callable $callback, array $params = [])
    {
        return new StreamNode($this->callbackService, new BindArray($callback, $params), $this);
    }

    /**
     * @inheritDoc
     */
    public function __invoke()
    {
        return $this->apply(func_get_args());
    }

    /**
     * @inheritDoc
     */
    public function call($param1 = null, $param2 = null)
    {
        return $this->apply(func_get_args());
    }

    /**
     * @inheritDoc
     */
    public function apply(array $params = [])
    {
        $callbacks = $this->callbacks();
        $result = $params;
        foreach ($callbacks as $callback) {
            $result = call_user_func_array($callback, $params);
            $params = [$result];
        }
        return $result;
    }

    /**
     * @inheritDoc
     */
    public function parent()
    {
        return $this->parent;
    }

    /**
     * @inheritDoc
     */
    public function callback()
    {
        return $this->callback;
    }

    /**
     * @return callable[]
     */
    public function callbacks()
    {
        $callbacks = [];
        $child = $this;
        while ($child !== null && $child->callback !== null) {
            array_unshift($callbacks, $child->callback());
            $child = $child->parent();
        }
        return $callbacks;
    }

    /**
     * @param mixed $field
     * @return Stream
     */
    public function set(&$field)
    {
        $args = array_merge([&$field], array_slice(func_get_args(), 1));
        return $this->callbackService->next($this, __FUNCTION__, $args);
    }

    /**
     * @param mixed $field
     * @return Stream
     */
    public function increment(&$field)
    {
        $args = array_merge([&$field], array_slice(func_get_args(), 1));
        return $this->callbackService->next($this, __FUNCTION__, $args);
    }

    /**
     * @param mixed $field
     * @return Stream
     */
    public function decrement(&$field)
    {
        $args = array_merge([&$field], array_slice(func_get_args(), 1));
        return $this->callbackService->next($this, __FUNCTION__, $args);
    }
}
