<?php

namespace ProjxIO\Fluent;

use ProjxIO\Fluent\Callbacks\AndMaker;
use ProjxIO\Fluent\Callbacks\Ands;
use ProjxIO\Fluent\Callbacks\Arg;
use ProjxIO\Fluent\Callbacks\Args;
use ProjxIO\Fluent\Callbacks\ArrayMaker;
use ProjxIO\Fluent\Callbacks\Assert;
use ProjxIO\Fluent\Callbacks\AtLeast;
use ProjxIO\Fluent\Callbacks\AtMost;
use ProjxIO\Fluent\Callbacks\ComparedTo;
use ProjxIO\Fluent\Callbacks\Decrement;
use ProjxIO\Fluent\Callbacks\Diff;
use ProjxIO\Fluent\Callbacks\DividedBy;
use ProjxIO\Fluent\Callbacks\Each;
use ProjxIO\Fluent\Callbacks\EqualTo;
use ProjxIO\Fluent\Callbacks\Explode;
use ProjxIO\Fluent\Callbacks\Filter;
use ProjxIO\Fluent\Callbacks\Flatten;
use ProjxIO\Fluent\Callbacks\Get;
use ProjxIO\Fluent\Callbacks\GetElement;
use ProjxIO\Fluent\Callbacks\GetField;
use ProjxIO\Fluent\Callbacks\Group;
use ProjxIO\Fluent\Callbacks\Has;
use ProjxIO\Fluent\Callbacks\IfMaker;
use ProjxIO\Fluent\Callbacks\Implode;
use ProjxIO\Fluent\Callbacks\Increment;
use ProjxIO\Fluent\Callbacks\InstanceOfMethod;
use ProjxIO\Fluent\Callbacks\Intersect;
use ProjxIO\Fluent\Callbacks\Key;
use ProjxIO\Fluent\Callbacks\KeyOf;
use ProjxIO\Fluent\Callbacks\Keys;
use ProjxIO\Fluent\Callbacks\Length;
use ProjxIO\Fluent\Callbacks\LessThan;
use ProjxIO\Fluent\Callbacks\Map;
use ProjxIO\Fluent\Callbacks\Merge;
use ProjxIO\Fluent\Callbacks\Minus;
use ProjxIO\Fluent\Callbacks\MoreThan;
use ProjxIO\Fluent\Callbacks\Not;
use ProjxIO\Fluent\Callbacks\Object;
use ProjxIO\Fluent\Callbacks\OrMaker;
use ProjxIO\Fluent\Callbacks\Ors;
use ProjxIO\Fluent\Callbacks\Plus;
use ProjxIO\Fluent\Callbacks\Regex;
use ProjxIO\Fluent\Callbacks\Rename;
use ProjxIO\Fluent\Callbacks\Reverse;
use ProjxIO\Fluent\Callbacks\Sort;
use ProjxIO\Fluent\Callbacks\SwitchCase;
use ProjxIO\Fluent\Callbacks\Times;
use ProjxIO\Fluent\Callbacks\ToArray;
use ProjxIO\Fluent\Callbacks\ToBoolean;
use ProjxIO\Fluent\Callbacks\ToInteger;
use ProjxIO\Fluent\Callbacks\ToObject;
use ProjxIO\Fluent\Callbacks\ToString;
use ProjxIO\Fluent\Callbacks\Union;
use ProjxIO\Fluent\Callbacks\Unique;
use ProjxIO\Fluent\Callbacks\Value;
use ProjxIO\Fluent\Callbacks\ValueOf;
use ProjxIO\Fluent\Callbacks\Values;
use ProjxIO\Fluent\Callbacks\With;

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
            'instanceOf' => new BindCallbackFactory(new ConstantCallbackFactory(new InstanceOfMethod())),
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
            'keyOf' => new BindCallbackFactory(new ConstantCallbackFactory(new KeyOf())),
            'valueOf' => new BindCallbackFactory(new ConstantCallbackFactory(new ValueOf())),
            'flatten' => new BindCallbackFactory(new ConstantCallbackFactory(new Flatten())),
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
            'not' => new BindCallbackFactory(new ConstantCallbackFactory(new Not())),
            'ands' => new BindCallbackFactory(new ConstantCallbackFactory(new Ands())),
            'and' => new BindCallbackFactory(new ConstantCallbackFactory(new AndMaker())),
            'or' => new BindCallbackFactory(new ConstantCallbackFactory(new OrMaker())),
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
            'arg' => new BindCallbackFactory(new ConstantCallbackFactory(new Arg())),
            'args' => new BindCallbackFactory(new ConstantCallbackFactory(new Args())),
            'toArray' => new BindCallbackFactory(new ConstantCallbackFactory(new ToArray())),
            'toBoolean' => new BindCallbackFactory(new ConstantCallbackFactory(new ToBoolean())),
            'toInteger' => new BindCallbackFactory(new ConstantCallbackFactory(new ToInteger())),
            'toObject' => new BindCallbackFactory(new ConstantCallbackFactory(new ToObject())),
            'toString' => new BindCallbackFactory(new ConstantCallbackFactory(new ToString())),
            'has' => new BindCallbackFactory(new ConstantCallbackFactory(new Has())),
            'get' => new BindCallbackFactory(new ConstantCallbackFactory(new Get())),
            'getField' => new BindCallbackFactory(new ConstantCallbackFactory(new GetField())),
            'getElement' => new BindCallbackFactory(new ConstantCallbackFactory(new GetElement())),
            'object' => new BindCallbackFactory(new ConstantCallbackFactory(new Object())),
            'array' => new BindCallbackFactory(new ConstantCallbackFactory(new ArrayMaker())),
            'assert' => new BindCallbackFactory(new ConstantCallbackFactory(new Assert())),
        ]);
    }

    public static function registerFlowMethods()
    {
        self::registerMethods([
            'switch' => new BindCallbackFactory(new ConstantCallbackFactory(new SwitchCase())),
            'if' => new BindCallbackFactory(new ConstantCallbackFactory(new IfMaker())),
        ]);
    }

    public static function registerStringMethods()
    {
        self::registerMethods([
            'regex' => new BindCallbackFactory(new ConstantCallbackFactory(new Regex())),
            'implode' => new BindCallbackFactory(new ConstantCallbackFactory(new Implode())),
            'explode' => new BindCallbackFactory(new ConstantCallbackFactory(new Explode())),
        ]);
    }

    public static function register()
    {
        self::registerBasicMethods();
        self::registerMathMethods();
        self::registerStringMethods();
        self::registerComparisonMethods();
        self::registerArrayMethods();
        self::registerCollectionMethods();
        self::registerLogicMethods();
        self::registerIterationMethods();
        self::registerBasicMethods();
        self::registerFlowMethods();
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

    /**
     * @param callable $callback
     * @param array ...$params
     * @return Stream
     */
    public static function then(callable $callback, ... $params)
    {
        return self::thenp($callback, $params);
    }

    /**
     * @param callable $callback
     * @param array $params
     * @return Stream
     */
    public static function thenp(callable $callback, array $params = [])
    {
        return self::stream()->thenp($callback, $params);
    }
}
