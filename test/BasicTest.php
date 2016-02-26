<?php

namespace ProjxIO\Fluent;

use PHPUnit_Framework_TestCase;

class BasicTest extends PHPUnit_Framework_TestCase
{
    public function testHasNone()
    {
        $value = ['a' => ['b' => 'c']];
        $actual = F($value)->has([])->call();
        $this->assertTrue($actual);
    }

    public function testHasInArray()
    {
        $value = ['a' => ['b' => 'c']];
        $actual = F($value)->has('a')->call();
        $this->assertTrue($actual);
    }

    public function testDoesNotHaveInArray()
    {
        $value = ['a' => ['b' => 'c']];
        $actual = F($value)->has('b')->call();
        $this->assertFalse($actual);
    }

    public function testHasInObject()
    {
        $value = (object)['a' => ['b' => 'c']];
        $actual = F($value)->has('a')->call();
        $this->assertTrue($actual);
    }

    public function testDoesNotHaveInObject()
    {
        $value = (object)['a' => ['b' => 'c']];
        $actual = F($value)->has('b')->call();
        $this->assertFalse($actual);
    }

    public function testDoesHasWithoutContainer()
    {
        $value = 5;
        $actual = F($value)->has('b')->call();
        $this->assertFalse($actual);
    }

    public function testGet()
    {
        $value = ['a' => ['b' => 'c']];
        $expect = 'c';
        $actual = F($value)->get(['a', 'b'])->call();
        $this->assertEquals($expect, $actual);
    }

    public function testToString()
    {
        $value = 404;
        $expect = '404';
        $actual = F($value)->toString()->call();
        $this->assertEquals($expect, $actual);
        $this->assertInternalType('string', $actual);
    }

    public function testToInteger()
    {
        $value = '404';
        $expect = 404;
        $actual = F($value)->toInteger()->call();
        $this->assertEquals($expect, $actual);
        $this->assertInternalType('integer', $actual);
    }

    public function testToObject()
    {
        $value = ['a' => 'b'];
        $expect = (object)$value;
        $actual = F($value)->toObject()->call();
        $this->assertEquals($expect, $actual);
        $this->assertInternalType('object', $actual);
    }

    public function testToArray()
    {
        $value = (object)['a' => 'b'];
        $expect = (array)$value;
        $actual = F($value)->toArray()->call();
        $this->assertEquals($expect, $actual);
        $this->assertInternalType('array', $actual);
    }

    public function testToBoolean()
    {
        $value = 5;
        $expect = true;
        $actual = F($value)->toBoolean()->call();
        $this->assertEquals($expect, $actual);
        $this->assertInternalType('boolean', $actual);
    }

    public function testAssert()
    {
        $value = (object)['a' => (object)['b' => 'c']];
        $expect = 'c';
        F($value)->a->b->assert(F()->equalTo($expect))->call();
    }

    /**
     * @expectedException \ProjxIO\Fluent\AssertionException
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
            'p' => (object)['first' => 'a', 'last' => 'b', 'colors' => ['blue', 'red']],
            'q' => (object)['first' => 'x', 'last' => 'y', 'colors' => ['green', 'yellow', 'black']],
        ];

        $expect = [
            'p' => ['key' => 'p', 'name' => 'a', 'color' => 'red'],
            'q' => ['key' => 'q', 'name' => 'x', 'color' => 'yellow'],
        ];

        $actual = F($items)->map(F()->array([
            'key' => F()->key(),
            'name' => F()->first,
            'color' => F()->colors[1],
        ]))->call();

        $this->assertEquals($expect, $actual);
    }
}
