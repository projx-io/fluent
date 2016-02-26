<?php

namespace ProjxIO\Fluent;

use PHPUnit_Framework_TestCase;

class StreamTest extends PHPUnit_Framework_TestCase
{
    /**
     * Tests that a stream will not invoke offspring streams
     */
    public function testStreamWontInvokeOffspring()
    {
        $value = 0;
        $parent = F();
        $child = $parent->increment($value);
        $parent->call();
        $this->assertEquals(0, $value);
    }

    /**
     * Tests that a stream will not invoke offspring streams
     */
    public function testStreamOffspringWorks()
    {
        $value = 0;
        $parent = F();
        $child = $parent->increment($value)->call();
        $parent->call();
        $this->assertNotEquals(0, $value);
    }

    /**
     * Tests that a stream will not invoke older sibling streams
     */
    public function testStreamWontInvokeOlderSibling()
    {
        $value = 0;
        $parent = F();
        $child1 = $parent->increment($value);
        $child2 = $parent->then(F());
        $child2->call();
        $this->assertEquals(0, $value);
    }

    /**
     * Tests that a stream will not invoke older sibling streams
     */
    public function testStreamWontInvokeYoungerSibling()
    {
        $value = 0;
        $parent = F();
        $child1 = $parent->then(F());
        $child2 = $parent->increment($value);
        $child1->call();
        $this->assertEquals(0, $value);
    }

    /**
     * Tests that a stream will not invoke older sibling streams
     */
    public function testStreamWillInvokeParent()
    {
        $value_1 = 0;
        $value_2 = 0;
        $value_1_1 = 0;
        $value_2_1 = 0;
        $value_2_2 = 0;
        $value_2_1_1 = 0;

        $stream = F();
        $stream_1 = $stream->increment($value_1);
        $stream_2 = $stream->increment($value_2);
        $stream_1_1 = $stream_1->increment($value_1_1);
        $stream_2_1 = $stream_2->increment($value_2_1);
        $stream_2_2 = $stream_2->increment($value_2_2);
        $stream_2_1_1 = $stream_2_1->increment($value_2_1_1);

        $stream->call();
        $stream_1->call();
        $stream_2->call();
        $stream_1_1->call();
        $stream_2_1->call();
        $stream_2_2->call();
        $stream_2_1_1->call();

        $this->assertEquals(2, $value_1);
        $this->assertEquals(4, $value_2);
        $this->assertEquals(1, $value_1_1);
        $this->assertEquals(2, $value_2_1);
        $this->assertEquals(1, $value_2_2);
        $this->assertEquals(1, $value_2_1_1);
    }
}