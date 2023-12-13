<?php

class FooBar
{
    public string $foo = "Foo";
    public string $bar = "Bar";
    public string $qix = "Qix";
    public int $divisorFoo = 3;
    public int $divisorBar = 5;
    public int $divisorQix = 7;

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

    public function checkFooBar(int $number): string
    {
        if ($this->isPositive($number)) {

            $output = "";

            if ($this->isDivisible($number, $this->divisorFoo)) {
                $output .= $this->foo;
            }

            if ($this->isDivisible($number, $this->divisorBar)) {
                $output .= $this->bar;
            }

            if ($this->isDivisible($number, $this->divisorQix)) {
                $output .= $this->qix;
            }

            if ($output == "") {
                return (string)$number;
            } else {
                return $output;
            }
        }
    }
}
