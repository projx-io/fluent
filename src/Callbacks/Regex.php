<?php

namespace ProjxIO\Fluent\Callbacks;

use ProjxIO\Fluent\Method;

class Regex extends Method
{
    public function __invoke($pattern, $subject)
    {
        $matches = [];
        $matched = preg_match($pattern, $subject, $matches);
        return (object)[
            'matched' => $matched,
            'matches' => $matches,
            'pattern' => $pattern,
            'subject' => $subject,
        ];
    }
}
