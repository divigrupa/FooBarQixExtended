<?php
declare(strict_types=1);

class App
{
    private int $number;

    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public function getResult(): string
    {
        $this->validate();
        return ($this->getMultiple() === '') ? (string)$this->number : $this->getMultiple() . $this->getOccurrences();
    }

    public function getMultiple(): string
    {
        $array = [$this->getResultDividesBy3(), $this->getResultDividesBy5(), $this->getResultDividesBy7()];
        $array = array_filter($array);
        $array = implode(', ', $array);
        return $array;
    }

    public function getOccurrences(): string
    {
        return $this->getContains();
    }

    private function getResultDividesBy3(): string
    {
        return ($this->number % 3 === 0) ?  'Foo' : '';
    }

    private function getResultDividesBy5(): string
    {
        return ($this->number % 5 === 0) ?  'Bar' : '';
    }

    private function getResultDividesBy7(): string
    {
        return ($this->number % 7 === 0) ?  'Qix' : '';
    }

    private function getContains(): string
    {
        $number = (string)$this->number;
        $numLength = strlen((string)abs($number));
        $result = '';
        $z = 0;
        $i = 1;
        while ($i <= $numLength) {
            $character = $number[$z];
            if ($character == 3) {
                $result .= 'Foo';
            } elseif ($character == 5) {
                $result .= 'Bar';
            } elseif ($character == 7) {
                $result .= 'Qix';
            }
            $z++;
            $i++;
        }
        return $result;
    }

    private function validate(): void
    {
        if (!is_int($this->number)) {
            throw new Exception('FAIL:Enter integer Number');
        }
        if ($this->number < 0) {
            throw new Exception('ERROR:Enter positive number');
        }
    }
}