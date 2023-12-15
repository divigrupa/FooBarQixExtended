<?php

class InfQixFoo
{
    public string $infString = "Inf";
    public string $qixString = "Qix";
    public string $fooString = "Foo";
    public string $separator = ";";

    public int $infNumber = 8;
    public int $qixNumber = 7;
    public int $fooNumber = 3;

    public array $digitToString = [];
    
    public function __construct()
    {
        $this->digitToString = [
            $this->infNumber => $this->infString,
            $this->qixNumber => $this->qixString,
            $this->fooNumber => $this->fooString,
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

    public function checkMultiples(int $number): string
    {
        if ($this->isPositive($number)) {

            $stringOutput = "";

            foreach ($this->digitToString as $divisor => $resultString) {
                if ($this->isDivisible($number, $divisor)) {
                    $stringOutput .= $resultString . $this->separator;
                }
            }

            if ($stringOutput == "") {
                return (string)$number;
            } else {
                return rtrim($stringOutput, $this->separator);
            }
        }
    }

    public function checkOccurrences(int $number): string 
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

    public function checkMultiplesAndOccurrences(int $number): string 
    {   
        if ($this->isPositive($number)) {
            $multiples = $this->checkMultiples($number);
            $occurrences = $this->checkOccurrences($number);

            return $this->extractTransformation($multiples, $occurrences, $number);
        }
    }

    public function checkDigitSum(int $number): string
    {
        $digitSum = array_sum(str_split($number));
        if ($digitSum == 8) {
            return $this->infString;
        }
        return "";
    }

    public function checkMultiplesAndOccurrencesAndSum(int $number): string
    {
        $multiplesAndOccurrencesString = $this->checkMultiplesAndOccurrences($number);
        $sumString = $this->checkDigitSum($number);

        return $multiplesAndOccurrencesString . $sumString;
    }
}
