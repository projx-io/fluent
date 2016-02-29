<?php

namespace ProjxIO\Fluent;

use PHPUnit_Framework_TestCase;

class ToTest extends PHPUnit_Framework_TestCase
{
    public function testToBooleanTrue()
    {
        $expect = true;
        $actual = F(1)->toBoolean();
        $this->assertEquals($expect, $actual);
    }

    public function testToBooleanFalse()
    {
        $expect = false;
        $actual = F(0)->toBoolean();
        $this->assertEquals($expect, $actual);
    }

    public function testToIntegerFromString()
    {
        $expect = 5;
        $actual = F('5')->toInteger();
        $this->assertEquals($expect, $actual);
    }

    public function testToIntegerFromBoolean()
    {
        $expect = 1;
        $actual = F(true)->toInteger();
        $this->assertEquals($expect, $actual);
    }

    public function testToString()
    {
        $expect = '5';
        $actual = F(5)->toString();
        $this->assertEquals($expect, $actual);
    }

    public function testToArray()
    {
        $expect = ['a' => 'b'];
        $actual = F((object)['a' => 'b'])->toArray();
        $this->assertEquals($expect, $actual);
    }

    public function testToObject()
    {
        $expect = (object)['a' => 'b'];
        $actual = F(['a' => 'b'])->toObject();
        $this->assertEquals($expect, $actual);
    }
}
