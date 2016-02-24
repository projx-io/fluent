<?php

namespace ProjxIO\Stream;

/**
 * @method static Stream args(array $params = [])
 * @method static Stream with($value = null)
 * @method static Stream comparedTo($expect = null, $actual = null)
 * @method static Stream equalTo($expect = null, $actual = null)
 * @method static Stream moreThan($expect = null, $actual = null)
 * @method static Stream lessThan($expect = null, $actual = null)
 * @method static Stream atLeast($expect = null, $actual = null)
 * @method static Stream atMost($expect = null, $actual = null)
 * @method static Stream ands($callbacks = [])
 * @method static Stream ors($callbacks = [])
 * @method static Stream key($value = null, $key = null)
 * @method static Stream value($value = null, $key = null)
 * @method static Stream increment(&$field)
 * @method static Stream decrement(&$value)
 * @method static Stream keys()
 * @method static Stream values()
 * @method static Stream reverse()
 * @method static Stream unique()
 * @method static Stream intersect($c = [], $b = [], $a = [])
 * @method static Stream diff($c = [], $b = [], $a = [])
 * @method static Stream union($c = [], $b = [], $a = [])
 * @method static Stream merge($c = [], $b = [], $a = [])
 * @method static Stream length($items = [])
 * @method static Stream implode($items = [])
 * @method static Stream explode($items = [])
 * @method static Stream each(callable $callback = null, $items = [])
 * @method static Stream map(callable $callback = null, $items = [])
 * @method static Stream filter(callable $callback = null, $items = [])
 * @method static Stream rename(callable $callback = null, $items = [])
 * @method static Stream group(callable $callback = null, $items = [])
 * @method static Stream sort(callable $callback = null, $items = [])
 * @method static Stream keyOf($items = [], $key = null)
 * @method static Stream valueOf($items = [], $value = null)
 * @method static Stream plus($a = null, $b = null)
 * @method static Stream minus($a = null, $b = null)
 * @method static Stream times($a = null, $b = null)
 * @method static Stream dividedBy($a = null, $b = null)
 */
interface StaticStream
{
}
