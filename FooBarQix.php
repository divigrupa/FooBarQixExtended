<?php

class FooBarQix
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

    public function checkFooBarQixOccurrences(int $number): string 
    {
        if ($this->isPositive($number)) {
            $stringOutput = "";
            $numberAsString = (string)$number;

            for ($i = 0; $i < strlen($numberAsString); $i++) {
                $digit = $numberAsString[$i];
                $stringOutput .= $this->digitToString($digit);
            }
            
            if ($stringOutput == "") {
                return (string)$number;
            }
            return $stringOutput;
        }
    }

    public function extractTransformation(string $multiples, string $occurrances, int $number): string
    {
        if ($multiples == $number && $occurrances == $number) {
            return (string)$number;
        } elseif ($multiples == $number && $occurrances != $number) {
            return $occurrances;
        } elseif ($multiples != $number && $occurrances == $number) {
            return $multiples;
        } else {
            return $multiples . $occurrances;
        }
    }

    public function checkFooBarQixMultiplesAndOccurrences(int $number): string 
    {
        $multiples = $this->checkFooBarQixMultiples($number);
        $occurrences = $this->checkFooBarQixOccurrences($number);

        return $this->extractTransformation($multiples, $occurrences, $number);
    }
}
