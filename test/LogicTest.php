<?php

namespace ProjxIO\Fluent;

use PHPUnit_Framework_TestCase;

class LogicTest extends PHPUnit_Framework_TestCase
{
    public function testAndsTrue()
    {
        $actual = F(9)->ands([
            F::moreThan(5),
            F::lessThan(15),
        ])->call();
        $this->assertTrue($actual);
    }

    public function testAndsFalse()
    {
        $actual = F(19)->ands([
            F::moreThan(5),
            F::lessThan(15),
        ])->call();
        $this->assertFalse($actual);
    }

    public function testOrsTrue()
    {
        $actual = F(9)->ors([
            F::moreThan(10),
            F::lessThan(15),
        ])->call();
        $this->assertTrue($actual);
    }

    public function testOrsFalse()
    {
        $actual = F(19)->ors([
            F::moreThan(25),
            F::lessThan(15),
        ])->call();
        $this->assertFalse($actual);
    }
}