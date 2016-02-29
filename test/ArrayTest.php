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
}
