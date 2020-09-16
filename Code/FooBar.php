<?php

declare(strict_types=1);

class FooBar
{
    public function checker($number)
    {
        if (!is_int($number) || $number < 0) {
            throw new InvalidArgumentException();
        }

        $resultArray = array();
        $multiplierArray = array(
            "Foo" => 3,
            "Bar" => 5,
            "Qix" => 7,
        );

        foreach ($multiplierArray as $name => $multiplier) {
            if ($number % $multiplier == 0) {
                array_push($resultArray, $name);
            }
        }

        if (!empty($resultArray)) {
            $result = implode(", ", $resultArray);
        } else {
            $result = strval($number);
        }

        return $result;
    }
}
