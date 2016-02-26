<?php

namespace ProjxIO\Fluent\Callbacks;

use Exception;
use ProjxIO\Fluent\Method;

class Regex extends Method
{
    public function __invoke($pattern, $subject)
    {
        $matches = [];
        $matched = false;
        $error = null;
        try {
            $matched = preg_match($pattern, $subject, $matches);
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
        return (object)[
            'error' => $matched === false ? $error : false,
            'matched' => (boolean)$matched,
            'matches' => $matches,
            'pattern' => $pattern,
            'subject' => $subject,
        ];
    }
}
