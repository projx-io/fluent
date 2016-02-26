<?php

namespace ProjxIO\Fluent;

/**
 * @method static Stream args(array $params = [])
 * @method static Stream with($value = null)
 * @method static Stream comparedTo($expect = null, $actual = null)
 * @method static Stream equalTo($expect = null, $actual = null)
 * @method static Stream moreThan($expect = null, $actual = null)
 * @method static Stream lessThan($expect = null, $actual = null)
 * @method static Stream atLeast($expect = null, $actual = null)
 * @method static Stream atMost($expect = null, $actual = null)
 * @method static Stream and ($expect = null, $actual = null)
 * @method static Stream or ($expect = null, $actual = null)
 * @method static Stream instanceOf ($type = null, $value = null)
 * @method static Stream not($value = null)
 * @method static Stream ands($callbacks = [])
 * @method static Stream ors($callbacks = [])
 * @method static Stream key($value = null, $key = null)
 * @method static Stream value($value = null, $key = null)
 * @method static Stream increment(&$field)
 * @method static Stream decrement(&$field)
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
 * @method static Stream get($keys = [], $value)
 * @method static Stream toArray($value = null)
 * @method static Stream toBoolean($value = null)
 * @method static Stream toInteger($value = null)
 * @method static Stream toObject($value = null)
 * @method static Stream toString($value = null)
 * @method static Stream has($keys = [], $value)
 * @method static Stream object($callbacks = [], $value)
 * @method static Stream array($callbacks = [], $value)
 * @method static Stream switch (callable $callback, callable[] $cases = [])
 * @method static Stream if (callable $condition, callable $true, callable $false)
 */
interface StaticStream
{
}
