<?php

declare(strict_types=1);

class FooBar
{
    public function Checker($Number): string
    {
        if (is_int($Number) && $Number > 0) {
            $Result = "";

            if ($Number % 3 == 0 && $Number % 5 == 0) {
                $Result = "Foo, Bar";
            } elseif ($Number % 5 == 0) {
                $Result = "Bar";
            } elseif ($Number % 3 == 0) {
                $Result = "Foo";
            } else {
                $Result =strval($Number);
            }

            return
                $Result;
        } else {
            throw new InvalidArgumentException();
        }
    }
}
