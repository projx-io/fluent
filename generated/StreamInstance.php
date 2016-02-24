<?php

namespace ProjxIO\Stream;

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
 *
 * @property Stream args
 * @property Stream with
 * @property Stream comparedTo
 * @property Stream equalTo
 * @property Stream moreThan
 * @property Stream lessThan
 * @property Stream atLeast
 * @property Stream atMost
 * @property Stream ands
 * @property Stream ors
 * @property Stream key
 * @property Stream value
 * @property Stream increment
 * @property Stream decrement
 * @property Stream keys
 * @property Stream values
 * @property Stream reverse
 * @property Stream unique
 * @property Stream intersect
 * @property Stream diff
 * @property Stream union
 * @property Stream merge
 * @property Stream length
 * @property Stream implode
 * @property Stream explode
 * @property Stream each
 * @property Stream map
 * @property Stream filter
 * @property Stream rename
 * @property Stream group
 * @property Stream sort
 * @property Stream keyOf
 * @property Stream valueOf
 * @property Stream plus
 * @property Stream minus
 * @property Stream times
 * @property Stream dividedBy
 */
interface StreamInstance
{
}
