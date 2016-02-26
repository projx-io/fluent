<?php

namespace ProjxIO\Stream;

use ProjxIO\Stream\Callbacks\Ands;
use ProjxIO\Stream\Callbacks\Args;
use ProjxIO\Stream\Callbacks\ArrayMaker;
use ProjxIO\Stream\Callbacks\AtLeast;
use ProjxIO\Stream\Callbacks\AtMost;
use ProjxIO\Stream\Callbacks\ComparedTo;
use ProjxIO\Stream\Callbacks\DividedBy;
use ProjxIO\Stream\Callbacks\Explode;
use ProjxIO\Stream\Callbacks\Get;
use ProjxIO\Stream\Callbacks\GetElement;
use ProjxIO\Stream\Callbacks\GetField;
use ProjxIO\Stream\Callbacks\Implode;
use ProjxIO\Stream\Callbacks\KeyOf;
use ProjxIO\Stream\Callbacks\Length;
use ProjxIO\Stream\Callbacks\Decrement;
use ProjxIO\Stream\Callbacks\Diff;
use ProjxIO\Stream\Callbacks\Each;
use ProjxIO\Stream\Callbacks\EqualTo;
use ProjxIO\Stream\Callbacks\Filter;
use ProjxIO\Stream\Callbacks\Group;
use ProjxIO\Stream\Callbacks\Increment;
use ProjxIO\Stream\Callbacks\Intersect;
use ProjxIO\Stream\Callbacks\Key;
use ProjxIO\Stream\Callbacks\Keys;
use ProjxIO\Stream\Callbacks\LessThan;
use ProjxIO\Stream\Callbacks\Map;
use ProjxIO\Stream\Callbacks\Maps;
use ProjxIO\Stream\Callbacks\Merge;
use ProjxIO\Stream\Callbacks\Minus;
use ProjxIO\Stream\Callbacks\MoreThan;
use ProjxIO\Stream\Callbacks\Object;
use ProjxIO\Stream\Callbacks\Ors;
use ProjxIO\Stream\Callbacks\Plus;
use ProjxIO\Stream\Callbacks\Rename;
use ProjxIO\Stream\Callbacks\Reverse;
use ProjxIO\Stream\Callbacks\Set;
use ProjxIO\Stream\Callbacks\Sort;
use ProjxIO\Stream\Callbacks\Times;
use ProjxIO\Stream\Callbacks\Union;
use ProjxIO\Stream\Callbacks\Unique;
use ProjxIO\Stream\Callbacks\Value;
use ProjxIO\Stream\Callbacks\ValueOf;
use ProjxIO\Stream\Callbacks\Values;
use ProjxIO\Stream\Callbacks\With;

class Fluent implements StaticStream
{
    /**
     * @var Stream
     */
    private static $stream = null;

    /**
     * @var StreamFactory
     */
    public static $factory = null;

    public static $methods = [];

    public static function setup()
    {
        if (self::$stream === null) {
            self::register();

            self::$factory = self::$factory ?: new StreamNodeFactory(self::$methods);
            self::$stream = self::$factory->makeStream();
        }
    }

    public static function increment(&$field)
    {
        return self::stream()->increment($field);
    }

    public static function decrement(&$field)
    {
        return self::stream()->decrement($field);
    }

    public static function registerMethods($methods)
    {
        self::$methods = array_merge(self::$methods, $methods);
    }

    public static function registerMathMethods()
    {
        self::registerMethods([
            'plus' => new BindCallbackFactory(new ConstantCallbackFactory(new Plus())),
            'minus' => new BindCallbackFactory(new ConstantCallbackFactory(new Minus())),
            'times' => new BindCallbackFactory(new ConstantCallbackFactory(new Times())),
            'dividedBy' => new BindCallbackFactory(new ConstantCallbackFactory(new DividedBy())),
            'increment' => new BindCallbackFactory(new ConstantCallbackFactory(new Increment())),
            'decrement' => new BindCallbackFactory(new ConstantCallbackFactory(new Decrement())),
        ]);
    }

    public static function registerComparisonMethods()
    {
        self::registerMethods([
            'comparedTo' => new BindCallbackFactory(new ConstantCallbackFactory(new ComparedTo())),
            'equalTo' => new BindCallbackFactory(new ConstantCallbackFactory(new EqualTo())),
            'moreThan' => new BindCallbackFactory(new ConstantCallbackFactory(new MoreThan())),
            'lessThan' => new BindCallbackFactory(new ConstantCallbackFactory(new LessThan())),
            'atLeast' => new BindCallbackFactory(new ConstantCallbackFactory(new AtLeast())),
            'atMost' => new BindCallbackFactory(new ConstantCallbackFactory(new AtMost())),
        ]);
    }

    public static function registerArrayMethods()
    {
        self::registerMethods([
            'keys' => new BindCallbackFactory(new ConstantCallbackFactory(new Keys())),
            'values' => new BindCallbackFactory(new ConstantCallbackFactory(new Values())),
            'reverse' => new BindCallbackFactory(new ConstantCallbackFactory(new Reverse())),
            'unique' => new BindCallbackFactory(new ConstantCallbackFactory(new Unique())),
            'intersect' => new BindCallbackFactory(new ConstantCallbackFactory(new Intersect())),
            'diff' => new BindCallbackFactory(new ConstantCallbackFactory(new Diff())),
            'union' => new BindCallbackFactory(new ConstantCallbackFactory(new Union())),
            'merge' => new BindCallbackFactory(new ConstantCallbackFactory(new Merge())),
            'length' => new BindCallbackFactory(new ConstantCallbackFactory(new Length())),
            'implode' => new BindCallbackFactory(new ConstantCallbackFactory(new Implode())),
            'explode' => new BindCallbackFactory(new ConstantCallbackFactory(new Explode())),
            'keyOf' => new BindCallbackFactory(new ConstantCallbackFactory(new KeyOf())),
            'valueOf' => new BindCallbackFactory(new ConstantCallbackFactory(new ValueOf())),
        ]);
    }

    public static function registerCollectionMethods()
    {
        self::registerMethods([
            'each' => new BindCallbackFactory(new ConstantCallbackFactory(new Each())),
            'map' => new BindCallbackFactory(new ConstantCallbackFactory(new Map())),
            'filter' => new BindCallbackFactory(new ConstantCallbackFactory(new Filter())),
            'rename' => new BindCallbackFactory(new ConstantCallbackFactory(new Rename())),
            'group' => new BindCallbackFactory(new ConstantCallbackFactory(new Group())),
            'sort' => new BindCallbackFactory(new ConstantCallbackFactory(new Sort())),
        ]);
    }

    public static function registerLogicMethods()
    {
        self::registerMethods([
            'ands' => new BindCallbackFactory(new ConstantCallbackFactory(new Ands())),
            'ors' => new BindCallbackFactory(new ConstantCallbackFactory(new Ors())),
        ]);
    }

    public static function registerIterationMethods()
    {
        self::registerMethods([
            'key' => new BindCallbackFactory(new ConstantCallbackFactory(new Key())),
            'value' => new BindCallbackFactory(new ConstantCallbackFactory(new Value())),
        ]);
    }

    public static function registerBasicMethods()
    {
        self::registerMethods([
            'with' => new BindCallbackFactory(new ConstantCallbackFactory(new With())),
            'args' => new BindCallbackFactory(new ConstantCallbackFactory(new Args())),
            'get' => new BindCallbackFactory(new ConstantCallbackFactory(new Get())),
            'getField' => new BindCallbackFactory(new ConstantCallbackFactory(new GetField())),
            'getElement' => new BindCallbackFactory(new ConstantCallbackFactory(new GetElement())),
            'object' => new BindCallbackFactory(new ConstantCallbackFactory(new Object())),
            'array' => new BindCallbackFactory(new ConstantCallbackFactory(new ArrayMaker())),
        ]);
    }

    public static function register()
    {
        self::registerBasicMethods();
        self::registerMathMethods();
        self::registerComparisonMethods();
        self::registerArrayMethods();
        self::registerCollectionMethods();
        self::registerLogicMethods();
        self::registerIterationMethods();
        self::registerBasicMethods();
    }

    /**
     * @return Stream
     */
    public static function stream()
    {
        self::setup();

        return self::$stream;
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return Stream
     */
    public static function __callStatic($name, $arguments)
    {
        return self::stream()->__call($name, $arguments);
    }

    public static function then(callable $callback)
    {
        return self::thenp($callback, array_slice(func_get_args(), 1));
    }

    public static function thenp(callable $callback, array $params = [])
    {
        return self::stream()->thenp($callback, $params);
    }
}
