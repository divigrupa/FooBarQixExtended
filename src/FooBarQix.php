<?php

declare(strict_types=1);

namespace Divi\Test;

class FooBarQix
{
    private $num = '';

    private $result = '';

    public function __construct($num)
    {
        $this->num = $num;
        new FooValidator($num);
    }

    public function run(): string
    {
        return (string) $this->checkMultiples()
            ->checkOccurances()
            ->checkEmpty();
    }

    private function checkMultiples()
    {
        return $this->checkMultiple(3, 'Foo')
            ->checkMultiple(5, 'Bar')
            ->checkMultiple(7, 'Qix');
    }

    private function checkMultiple($multiple, $append)
    {
        if ($this->num % $multiple == 0) {
            $this->result .= ($this->result ? ', ' : '') . $append;
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
        $this->checkDigit($sym, '3', 'Foo');
        $this->checkDigit($sym, '5', 'Bar');
        $this->checkDigit($sym, '7', 'Qix');
    }

    private function checkDigit($sym, $digit, $append)
    {
        if ($sym == $digit) {
            $this->result .= $append;
        }
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
