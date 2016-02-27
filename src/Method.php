<?php

namespace ProjxIO\Fluent;

use ProjxIO\Fluent\Callbacks\BindArray;

abstract class Method implements Callback
{
    /**
     * @param array ...$params
     * @return mixed
     */
    public static function exec(... $params)
    {
        return static::execp($params);
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
     * @param array ...$params
     * @return \ProjxIO\Fluent\Callback
     */
    public static function bind(... $params)
    {
        return new BindArray(new static(), $params);
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
    public function call(... $params)
    {
        return call_user_func_array($this, $params);
    }

    /**
     * @inheritDoc
     */
    public function apply(array $params = [])
    {
        return call_user_func_array($this, $params);
    }
}
