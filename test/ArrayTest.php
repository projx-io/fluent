<?php

namespace ProjxIO\Fluent;

use PHPUnit_Framework_TestCase;

class ArrayTest extends PHPUnit_Framework_TestCase
{
    public function testFlatten()
    {
        $arrays = [['a', 'b'], ['c', 'd']];
        $expect = ['a', 'b', 'c', 'd'];
        $actual = F()->flatten($arrays)->call();
        $this->assertEquals($expect, $actual);
    }

    public function testFirst()
    {
        $arrays = ['a', 'b', 'c', 'd'];
        $expect = 'a';
        $actual = F()->first($arrays)->call();
        $this->assertEquals($expect, $actual);
    }

    public function testLast()
    {
        $arrays = ['a', 'b', 'c', 'd'];
        $expect = 'd';
        $actual = F()->last($arrays)->call();
        $this->assertEquals($expect, $actual);
    }

    public function testFront()
    {
        $arrays = ['a', 'b', 'c', 'd'];
        $expect = ['a', 'b'];
        $actual = F()->front(2, $arrays)->call();
        $this->assertEquals($expect, $actual);
    }

    public function testBack()
    {
        $arrays = ['a', 'b', 'c', 'd'];
        $expect = ['c', 'd'];
        $actual = F()->back(2, $arrays)->call();
        $this->assertEquals($expect, $actual);
    }

}
