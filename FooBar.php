<?php

class FooBar
{
    public string $foo = "Foo";
    public string $bar = "Bar";
    public int $divisorFoo = 3;
    public int $divisorBar = 5;

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

            if ($this->isDivisible($number, $this->divisorFoo) && $this->isDivisible($number, $this->divisorBar)) {
                return $this->foo . $this->bar;
            } elseif ($this->isDivisible($number, $this->divisorFoo)) {
                return $this->foo;
            } elseif ($this->isDivisible($number, $this->divisorBar)) {
                return $this->bar;
            } else {
                return (string)$number;
            }
        }
    }
}
