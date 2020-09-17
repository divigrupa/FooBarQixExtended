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

    public function checkerWithAppend($number)
    {
        $result = $this->checker($number);

        if (preg_match('~[0-9]~', $result)) {
            $result = "";
        }

        $splittedNumbersArray = array_unique(str_split((string)$number));
        $appendArray = array(
            "Foo" => 3,
            "Bar" => 5,
            "Qix" => 7,
        );

        foreach ($splittedNumbersArray as $digits) {
            foreach ($appendArray as $name => $multiplier) {
                if ($digits == $multiplier) {
                    $result .= $name;
                }
            }
        }

        return $result;
    }
}
