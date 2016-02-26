<?php

namespace ProjxIO\Fluent;

use PHPUnit_Framework_TestCase;

class CollectionTest extends PHPUnit_Framework_TestCase
{
    public function testEach()
    {
        $count = 0;
        $items = ['a', 'b'];
        $expect = ['a', 'b'];
        $actual = fluent()
            ->each(F::increment($count))
            ->call($items);
        $this->assertEquals($expect, $actual);
        $this->assertCount($count, $items);
    }

    public function testMap()
    {
        $items = ['a', 'b'];
        $expect = [0, 1];
        $actual = fluent()
            ->map(F::key())
            ->call($items);
        $this->assertEquals($expect, $actual);
    }

    public function testRename()
    {
        $items = ['a', 'b'];
        $expect = ['a' => 'a', 'b' => 'b'];
        $actual = fluent()
            ->rename(F::value())
            ->call($items);
        $this->assertEquals($expect, $actual);
    }

    public function testFilter()
    {
        $items = ['a', 'b'];
        $expect = ['a'];
        $actual = fluent()
            ->filter(F::value()->equalTo('a'))
            ->call($items);
        $this->assertEquals($expect, $actual);
    }

    public function testGroup()
    {
        $items = ['a' => 'x', 'b' => 'y', 'c' => 'x'];
        $expect = [
            'x' => ['a' => 'x', 'c' => 'x'],
            'y' => ['b' => 'y'],
        ];
        $actual = fluent()
            ->group(F::value())
            ->call($items);
        $this->assertEquals($expect, $actual);
    }

    public function testGroupKeys()
    {
        $items = ['a' => 'x', 'b' => 'y', 'c' => 'x'];
        $expect = [
            'x' => ['a', 'c'],
            'y' => ['b'],
        ];
        $actual = fluent()
            ->group(F::value())
            ->map(F::keys())
            ->call($items);
        $this->assertEquals($expect, $actual);
    }

    public function testSort()
    {
        $items = ['y', 'z', 'a', 'c', 'x', 'b'];
        $expect = ['a', 'b', 'c', 'x', 'y', 'z'];
        $actual = fluent()
            ->sort(F::comparedTo())
            ->values()
            ->call($items);
        $this->assertEquals($expect, $actual);
    }

    public function testReverse()
    {
        $items = ['y', 'z', 'a', 'c', 'x', 'b'];
        $expect = ['b', 'x', 'c', 'a', 'z', 'y'];
        $actual = fluent()
            ->reverse()
            ->values()
            ->call($items);
        $this->assertEquals($expect, $actual);
    }

    public function testUnique()
    {
        $items = ['a', 'b', 'a', 'c', 'a'];
        $expect = ['a', 'b', 'c'];
        $actual = fluent()
            ->unique()
            ->values()
            ->call($items);
        $this->assertEquals($expect, $actual);
    }

    public function testIntersect()
    {
        $a = ['a', 'b', 'c', 'f'];
        $b = ['f', 'b', 'd', 'e'];
        $expect = ['b', 'f'];
        $actual = fluent()
            ->intersect($b)
            ->values()
            ->call($a);
        $this->assertEquals($expect, $actual);
    }

    public function testDiff()
    {
        $a = ['a', 'b', 'c'];
        $b = ['b', 'd', 'e'];
        $expect = ['a', 'c'];
        $actual = fluent()
            ->diff($b)
            ->values()
            ->call($a);
        $this->assertEquals($expect, $actual);
    }

    public function testUnion()
    {
        $a = ['a', 'b', 'c', 'f'];
        $b = ['f', 'b', 'd', 'e'];
        $expect = ['a', 'b', 'c', 'f', 'd', 'e'];
        $actual = fluent()
            ->union($b)
            ->values()
            ->call($a);
        $this->assertEquals($expect, $actual);
    }

    public function testMerge()
    {
        $a = ['a', 'b', 'c', 'f'];
        $b = ['f', 'b', 'd', 'e'];
        $expect = ['a', 'b', 'c', 'f', 'f', 'b', 'd', 'e'];
        $actual = fluent()
            ->merge($b)
            ->values()
            ->call($a);
        $this->assertEquals($expect, $actual);
    }

    public function testLength()
    {
        $a = ['a', 'b', 'c', 'f'];
        $expect = 4;
        $actual = fluent()
            ->length()
            ->call($a);
        $this->assertEquals($expect, $actual);
    }

    public function testImplode()
    {
        $items = ['a', 'b', 'c', 'f'];
        $expect = 'a,b,c,f';
        $actual = fluent()
            ->implode(',')
            ->call($items);
        $this->assertEquals($expect, $actual);
    }

    public function testExplode()
    {
        $a = 'a,b,c,f';
        $expect = ['a', 'b', 'c', 'f'];
        $actual = fluent($a)
            ->explode(',')
            ->call();
        $this->assertEquals($expect, $actual);
    }

    public function testValueOf()
    {
        $items = ['a','b','c'];
        $expect = true;
        $actual = fluent('b')
            ->valueOf($items)
            ->call();
        $this->assertEquals($expect, $actual);
    }

    public function testKeyOf()
    {
        $items = ['a'=>'A','b'=>'B','c'=>'C'];
        $expect = true;
        $actual = fluent('b')
            ->keyOf($items)
            ->call();
        $this->assertEquals($expect, $actual);
    }
}
