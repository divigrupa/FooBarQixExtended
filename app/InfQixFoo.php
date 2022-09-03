<?php

namespace App;

use Exception;

class InfQixFoo
{
    private int $inputNumber;
    private array $multiples = [8, 7, 3];
    private array $multiplesText = [
        8 => "Inf",
        7 => "Qix",
        3 => "Foo"
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
        return implode("; ", $this->result);
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
        return implode("; ", $this->result);
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
        if ($inputNumberToArray == $this->result) {
            return implode ("", $this->result);
        } else {
            return implode ("; ", $this->result);
        }
    }
};