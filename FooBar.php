<?php

class FooBar
{
    public string $fooString = "Foo";
    public string $barString = "Bar";
    public string $qixString = "Qix";

    public int $fooNumber = 3;
    public int $barNumber = 5;
    public int $qixNumber = 7;

    public array $digitToString = [];
    
    public function __construct()
    {
        $this->digitToString = [
            $this->fooNumber => $this->fooString,
            $this->barNumber => $this->barString,
            $this->qixNumber => $this->qixString
        ];
    }

    public function digitToString(int $digit): string
    {
        if (isset($this->digitToString[$digit])) {
            return $this->digitToString[$digit];
        } else {
            return "";
        }
    }

    public function isDivisible(int $number, int $divisor): bool
    {
        if ($number % $divisor == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function isPositive(int $number): bool
    {
        if ($number < 0) {
            throw new ValueError("Provided value must be a positive integer");
        } else {
            return true;
        }
    }

    public function checkFooBarQixMultiples(int $number): string
    {
        if ($this->isPositive($number)) {

            $stringOutput = "";

            foreach ($this->digitToString as $divisor => $resultString) {
                if ($this->isDivisible($number, $divisor)) {
                    $stringOutput .= $resultString;
                }
            }

            if ($stringOutput == "") {
                return (string)$number;
            } else {
                return $stringOutput;
            }
        }
    }
}
