<?php

namespace ProjxIO\Fluent;

/**
 * @method Stream args(array $params = [])
 * @method Stream with($value = null)
 * @method Stream comparedTo($expect = null, $actual = null)
 * @method Stream equalTo($expect = null, $actual = null)
 * @method Stream moreThan($expect = null, $actual = null)
 * @method Stream lessThan($expect = null, $actual = null)
 * @method Stream atLeast($expect = null, $actual = null)
 * @method Stream atMost($expect = null, $actual = null)
 * @method Stream ands($callbacks = [])
 * @method Stream ors($callbacks = [])
 * @method Stream key($value = null, $key = null)
 * @method Stream value($value = null, $key = null)
 * @method Stream increment(&$field)
 * @method Stream decrement(&$field)
 * @method Stream keys()
 * @method Stream values()
 * @method Stream reverse()
 * @method Stream unique()
 * @method Stream intersect($c = [], $b = [], $a = [])
 * @method Stream diff($c = [], $b = [], $a = [])
 * @method Stream union($c = [], $b = [], $a = [])
 * @method Stream merge($c = [], $b = [], $a = [])
 * @method Stream length($items = [])
 * @method Stream implode($items = [])
 * @method Stream explode($items = [])
 * @method Stream each(callable $callback = null, $items = [])
 * @method Stream map(callable $callback = null, $items = [])
 * @method Stream filter(callable $callback = null, $items = [])
 * @method Stream rename(callable $callback = null, $items = [])
 * @method Stream group(callable $callback = null, $items = [])
 * @method Stream sort(callable $callback = null, $items = [])
 * @method Stream keyOf($items = [], $key = null)
 * @method Stream valueOf($items = [], $value = null)
 * @method Stream plus($a = null, $b = null)
 * @method Stream minus($a = null, $b = null)
 * @method Stream times($a = null, $b = null)
 * @method Stream dividedBy($a = null, $b = null)
 * @method Stream get($keys = [], $value)
 * @method Stream object($callbacks = [], $value)
 * @method Stream array($callbacks = [], $value)
 *
 */
interface StreamInstance
{
}
