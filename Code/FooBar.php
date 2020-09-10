<?php

declare(strict_types=1);

class FooBar
{
    public function checker($number)
    {
        if (is_int($number) && $number > 0) {
            if ($number % 3 == 0 && $number % 5 == 0) {
                $result = "Foo, Bar";
            } elseif ($number % 5 == 0) {
                $result = "Bar";
            } elseif ($number % 3 == 0) {
                $result = "Foo";
            } else {
                $result = strval($number);
            }
            return $result;
        } else {
            throw new InvalidArgumentException();
        }
    }
}
