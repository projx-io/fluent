<?php

namespace ProjxIO\Stream;

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

    public function testMaps()
    {
        $items = [
            (object)['first' => 'a', 'last' => 'b', 'colors' => ['blue', 'red']],
            (object)['first' => 'x', 'last' => 'y', 'colors' => ['green', 'yellow', 'black']],
        ];

        $expect = [
            ['name' => 'a', 'color' => 'red'],
            ['name' => 'x', 'color' => 'yellow'],
        ];

        $actual = F($items)->map(F()->maps([
            'name' => F()->first,
            'color' => F()->colors[1],
        ]))->call();

        $this->assertEquals($expect, $actual);
    }
}
