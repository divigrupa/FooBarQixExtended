<?php

declare(strict_types=1);

class FooBar
{
    public function checker($number)
    {
        $resultArray = array();

        if (!is_int($number) || $number < 0) {
            throw new InvalidArgumentException();
        }

        if ($number % 3 == 0) {
            $resultArray[0] = "Foo";
        }

        if ($number % 5 == 0) {
            $resultArray[1] = "Bar";
        }

        if ($number % 7 == 0) {
            $resultArray[2] = "Qix";
        }

        if (!empty($resultArray)) {
            $result = implode(", ", $resultArray);
        } else {
            $result = strval($number);
        }

        return $result;
    }
}
