<?php

namespace ProjxIO\Stream;

use AssertionError;
use PHPUnit_Framework_Error_Warning;
use PHPUnit_Framework_TestCase;

class BasicTest extends PHPUnit_Framework_TestCase
{
    public function testGet()
    {
        $value = ['a' => ['b' => 'c']];
        $expect = 'c';
        $actual = F($value)->get(['a', 'b'])->call();
        $this->assertEquals($expect, $actual);
    }

    public function testAssert()
    {
        $value = (object)['a' => (object)['b' => 'c']];
        $expect = 'c';
        F($value)->a->b->assert(F()->equalTo($expect))->call();
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     */
    public function testAssertFailed()
    {
        $value = (object)['a' => (object)['b' => 'd']];
        $expect = 'c';
        F($value)->a->b->assert(F()->equalTo($expect))->call();
    }

    public function testGetField()
    {
        $value = (object)['a' => (object)['b' => 'c']];
        $expect = 'c';
        $actual = F($value)->a->b->call();
        $this->assertEquals($expect, $actual);
    }

    public function testGetElement()
    {
        $value = [['a', 'b', 'c']];
        $expect = 'c';
        $actual = F($value)[0][2]->call();
        $this->assertEquals($expect, $actual);
    }

    public function testObject()
    {
        $items = [
            (object)['first' => 'a', 'last' => 'b', 'colors' => ['blue', 'red']],
            (object)['first' => 'x', 'last' => 'y', 'colors' => ['green', 'yellow', 'black']],
        ];

        $expect = [
            (object)['name' => 'a', 'color' => 'red'],
            (object)['name' => 'x', 'color' => 'yellow'],
        ];

        $actual = F($items)->map(F()->object([
            'name' => F()->first,
            'color' => F()->colors[1],
        ]))->call();

        $this->assertEquals($expect, $actual);
    }

    public function testArray()
    {
        $items = [
            (object)['first' => 'a', 'last' => 'b', 'colors' => ['blue', 'red']],
            (object)['first' => 'x', 'last' => 'y', 'colors' => ['green', 'yellow', 'black']],
        ];

        $expect = [
            ['name' => 'a', 'color' => 'red'],
            ['name' => 'x', 'color' => 'yellow'],
        ];

        $actual = F($items)->map(F()->array([
            'name' => F()->first,
            'color' => F()->colors[1],
        ]))->call();

        $this->assertEquals($expect, $actual);
    }

    public function testArrayKey()
    {
        $items = [
            (object)['first' => 'a', 'last' => 'b', 'colors' => ['blue', 'red']],
            (object)['first' => 'x', 'last' => 'y', 'colors' => ['green', 'yellow', 'black']],
        ];

        $expect = [
            ['key' => 0, 'name' => 'a', 'color' => 'red'],
            ['key' => 1, 'name' => 'x', 'color' => 'yellow'],
        ];

        $actual = F($items)->map(F()->array([
            'key' => F()->key(),
            'name' => F()->first,
            'color' => F()->colors[1],
        ]))->call();

        $this->assertEquals($expect, $actual);
    }
}
