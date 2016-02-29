<?php

namespace ProjxIO\Fluent;

use ProjxIO\Fluent\Callbacks\BindArray;

abstract class Method implements Callback
{
    /**
     * @return mixed
     */
    public static function exec()
    {
        return static::execp(func_get_args());
    }

    /**
     * @param array $params
     * @return mixed
     */
    public static function execp(array $params = [])
    {
        return call_user_func_array(new static(), $params);
    }

    /**
     * @return \ProjxIO\Fluent\Callback
     */
    public static function bind()
    {
        return new BindArray(new static(), func_get_args());
    }

    /**
     * @param array $params
     * @return \ProjxIO\Fluent\Callback
     */
    public static function bindp(array $params = [])
    {
        return new BindArray(new static(), $params);
    }

    /**
     * @inheritDoc
     */
    public function call()
    {
        return call_user_func_array($this, func_get_args());
    }

    /**
     * @inheritDoc
     */
    public function apply(array $params = [])
    {
        return call_user_func_array($this, $params);
    }
}
