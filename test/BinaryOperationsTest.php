<?php

namespace ProjxIO\Fluent;

use PHPUnit_Framework_TestCase;

class BinaryOperationsTest extends PHPUnit_Framework_TestCase
{

    public function dataProvider()
    {
        return [
            ['moreThan', 'b', 'a', false],
            ['moreThan', 'b', 'b', false],
            ['moreThan', 'b', 'c', true],

            ['atLeast', 'b', 'a', false],
            ['atLeast', 'b', 'b', true],
            ['atLeast', 'b', 'c', true],

            ['equalTo', 'a', 'a', true],
            ['equalTo', 'a', 'b', false],

            ['atMost', 'b', 'a', true],
            ['atMost', 'b', 'b', true],
            ['atMost', 'b', 'c', false],

            ['lessThan', 'b', 'a', true],
            ['lessThan', 'b', 'b', false],
            ['lessThan', 'b', 'c', false],

            ['value', 'a', 'b', 'a'],
            ['key', 'a', 'b', 'b'],

            ['plus', 5, 10, 15],
            ['minus', 5, 10, 5],
            ['times', 5, 10, 50],
            ['dividedBy', 5, 10, 2],
        ];
    }

    /**
     * @param $key
     * @param $expect
     * @param $actual
     * @param $result
     * @dataProvider dataProvider
     */
    public function test_withCall($key, $expect, $actual, $result)
    {
        $this->assertEquals($result, F($actual)->__call($key, [$expect])->call());
    }

    /**
     * @param $key
     * @param $expect
     * @param $actual
     * @param $result
     * @dataProvider dataProvider
     */
    public function test__call2Call($key, $expect, $actual, $result)
    {
        $this->assertEquals($result, F()->__call($key, [$expect, $actual])->call());
    }

    /**
     * @param $key
     * @param $expect
     * @param $actual
     * @param $result
     * @dataProvider dataProvider
     */
    public function test__call1Call($key, $expect, $actual, $result)
    {
        $this->assertEquals($result, F()->__call($key, [$expect])->call($actual));
    }

    /**
     * @param $key
     * @param $expect
     * @param $actual
     * @param $result
     * @dataProvider dataProvider
     */
    public function test__call0Call($key, $expect, $actual, $result)
    {
        $this->assertEquals($result, F()->__call($key, [])->call($expect, $actual));
    }

    /**
     * @param $key
     * @param $expect
     * @param $actual
     * @param $result
     * @dataProvider dataProvider
     */
    public function test_with_call($key, $expect, $actual, $result)
    {
        $this->assertEquals($result, F($actual)->__call($key, [$expect])->apply());
    }

    /**
     * @param $key
     * @param $expect
     * @param $actual
     * @param $result
     * @dataProvider dataProvider
     */
    public function test__call2Apply($key, $expect, $actual, $result)
    {
        $this->assertEquals($result, F()->__call($key, [$expect, $actual])->apply());
    }

    /**
     * @param $key
     * @param $expect
     * @param $actual
     * @param $result
     * @dataProvider dataProvider
     */
    public function test__call1Apply($key, $expect, $actual, $result)
    {
        $this->assertEquals($result, F()->__call($key, [$expect])->apply([$actual]));
    }

    /**
     * @param $key
     * @param $expect
     * @param $actual
     * @param $result
     * @dataProvider dataProvider
     */
    public function test__call0Apply($key, $expect, $actual, $result)
    {
        $this->assertEquals($result, F()->__call($key, [])->apply([$expect, $actual]));
    }
}
