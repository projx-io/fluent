<?php

namespace ProjxIO\Fluent;

use PHPUnit_Framework_TestCase;
use ProjxIO\Fluent\Callbacks\SwitchCase;

class FlowTest extends PHPUnit_Framework_TestCase
{
    public function testSwitch()
    {
        $person = (object)['gender' => 'male'];
        $expect = 'Man';

        $actual = F($person)->switch(F()->gender, [
            'male' => F('Man'),
            'female' => F('Woman'),
        ])->call();

        $this->assertEquals($expect, $actual);
    }

    public function testSwitch2()
    {
        $person = (object)['gender' => 'female'];
        $expect = 'Woman';

        $actual = F($person)->switch(F()->gender, [
            'male' => F('Man'),
            'female' => F('Woman'),
        ])->call();

        $this->assertEquals($expect, $actual);
    }

    public function testSwitchDefault()
    {
        $person = (object)['gender' => 'robot'];
        $expect = 'Unknown';

        $actual = F($person)->switch(F()->gender, [
            SwitchCase::DEFAULT_KEY => F('Unknown'),
            'male' => F('Man'),
            'female' => F('Woman'),
        ])->call();

        $this->assertEquals($expect, $actual);
    }

    public function testSwitchNull()
    {
        $person = (object)['gender' => 'robot'];
        $expect = null;

        $actual = F($person)->switch(F()->gender, [
            'male' => F('Man'),
            'female' => F('Woman'),
        ])->call();

        $this->assertEquals($expect, $actual);
    }

    public function testIf()
    {
        $person = (object)['gender' => 'male'];
        $expect = 'Man';

        $actual = F($person)
            ->if(
                F()->gender->equalTo('male'),
                F('Man'),
                F('Woman')
            )
            ->call();

        $this->assertEquals($expect, $actual);
    }

    public function testIfFalse()
    {
        $person = (object)['gender' => 'male'];
        $expect = 'Woman';

        $actual = F($person)
            ->if(
                F()->gender->equalTo('male')->not(),
                F('Man'),
                F('Woman')
            )
            ->call();

        $this->assertEquals($expect, $actual);
    }
}
