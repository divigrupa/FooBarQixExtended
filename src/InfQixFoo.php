<?php

declare(strict_types=1);

namespace Divi\Test;

class InfQixFoo
{
    private $num = '';

    private $result = '';

    private $digitSum = 0;

    public function __construct($num)
    {
        $this->num = $num;
        new FooValidator($num);
    }

    public function run(): string
    {
        return (string) $this->checkMultiples()
            ->checkOccurances()
            ->checkSum()
            ->checkEmpty();
    }

    private function checkMultiples()
    {
        return $this->checkMultiple(8, 'Inf')
            ->checkMultiple(7, 'Qix')
            ->checkMultiple(3, 'Foo');
    }

    private function checkMultiple($multiple, $append)
    {
        if ($this->num % $multiple == 0) {
            $this->result .= ($this->result ? '; ' : '') . $append;
        }
        return $this;
    }

    private function checkOccurances()
    {
        $arrStr = str_split((string) $this->num);
        array_walk($arrStr, array($this, 'checkAllDigits'));
        return $this;
    }

    private function checkAllDigits($sym)
    {
        $this->digitSum += $sym;
        $this->checkDigit($sym, '3', 'Foo');
        $this->checkDigit($sym, '8', 'Inf');
        $this->checkDigit($sym, '7', 'Qix');
    }

    private function checkDigit($sym, $digit, $append)
    {
        if ($sym == $digit) {
            $this->result .= $append;
        }
    }

    private function checkSum()
    {
        if ($this->digitSum % 8 == 0) {
            $this->result .= 'Inf';
        }

        return $this;
    }


    private function checkEmpty()
    {
        if (!$this->result) {
            $this->result = (string) $this->num;
        }
        return $this;
    }

    public function __toString()
    {
        return $this->result;
    }
}
