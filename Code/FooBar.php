<?php

declare(strict_types=1);

class FooBar
{
    public function checker($number)
    {
        $foo = "Foo";
        $bar = "Bar";
        $comma = ", ";

        if (!is_int($number) || $number < 0) {
            throw new InvalidArgumentException();
        } else {
            switch ($number) {
                case $number % 3 == 0 && $number % 5 == 0:
                    $result = $foo . $comma . $bar;
                    break;
                case $number % 5 == 0:
                    $result = $bar;
                    break;
                case $number % 3 == 0:
                    $result = $foo;
                    break;
                default:
                    $result = strval($number);
            }
        }
        return $result;
    }
}
