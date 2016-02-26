<?php

namespace ProjxIO\Fluent;

use PHPUnit_Framework_TestCase;

class StringTest extends PHPUnit_Framework_TestCase
{
    public function testRegexErrorFalse()
    {
        $subject = 'regex is fun!';
        $pattern = '/fun/';
        $actual = F($subject)->regex($pattern)->error->call();
        $this->assertFalse($actual);
    }

    public function testRegexErrorTrue()
    {
        $subject = 'regex is fun!';
        $pattern = '/fun';
        $actual = F($subject)->regex($pattern)->error->call();
        $this->assertNotFalse($actual);
    }

    public function testRegexPattern()
    {
        $subject = 'regex is fun!';
        $pattern = '/fun/';
        $actual = F($subject)->regex($pattern)->pattern->call();
        $this->assertEquals($pattern, $actual);
    }

    public function testRegexSubject()
    {
        $subject = 'regex is fun!';
        $pattern = '/fun/';
        $actual = F($subject)->regex($pattern)->subject->call();
        $this->assertEquals($subject, $actual);
    }

    public function testRegexMatched()
    {
        $subject = 'regex is fun!';
        $pattern = '/fun/';
        $actual = F($subject)->regex($pattern)->matched->call();
        $this->assertTrue($actual);
    }

    public function testRegexNotMatched()
    {
        $subject = 'regex is fun!';
        $pattern = '/boring/';
        $actual = F($subject)->regex($pattern)->matched->call();
        $this->assertFalse($actual);
    }

    public function testRegexMatches()
    {
        $subject = 'regex is fun!';
        $pattern = '/is (?P<adj>.*?)!/';
        $expect = 'fun';
        $actual = F($subject)->regex($pattern)->matches['adj']->call();
        $this->assertEquals($expect, $actual);
    }
}