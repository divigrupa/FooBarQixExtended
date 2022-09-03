<?php

namespace App;

use Exception;

class FooBar
{
    private int $inputNumber;
    private array $multiples = [3, 5, 7];
    private array $multiplesText = [
        3 => "Foo",
        5 => "Bar",
        7 => "Qix"
    ];
    private array $result = [];

    public function __construct(int $inputNumber)
    {
        $this->inputNumber = $inputNumber;
    }

    public function getInputNumber(): int
    {
        return $this->inputNumber;
    }

    public function determineMultiples(): string
    {
        for ($i = 0; $i < count($this->multiples); $i++) {
            if ($this->inputNumber % $this->multiples[$i] == 0) {
                array_push($this->result, $this->multiplesText[$this->multiples[$i]]);
            }
        }
        return implode("", $this->result);
    }

    public function determineAppearances(): string
    {
        $inputNumberToArray = str_split($this->inputNumber);
        for ($i = 0; $i < count($inputNumberToArray); $i++) {
            if (in_array($inputNumberToArray[$i], $this->multiples)) {
                array_push($this->result, $this->multiplesText[$inputNumberToArray[$i]]);
            } else {
                array_push($this->result, $inputNumberToArray[$i]);
            }
        }
        return implode("", $this->result);
    }

    public function run(): string
    {
        if ($this->getInputNumber() < 0) {
            throw new Exception("need positive integer");
        }

        for ($i = 0; $i < count($this->multiples); $i++) {
            if ($this->getInputNumber() % $this->multiples[$i] == 0) {
                array_push($this->result, $this->multiplesText[$this->multiples[$i]]);
            }
        }

        $inputNumberToArray = str_split($this->getInputNumber());
        for ($i = 0; $i < count($inputNumberToArray); $i++) {
            if (in_array($inputNumberToArray[$i], $this->multiples)) {
                array_push($this->result, $this->multiplesText[$inputNumberToArray[$i]]);
            } else {
                array_push($this->result, $inputNumberToArray[$i]);
            }
        }
        return implode("", $this->result);
    }
};