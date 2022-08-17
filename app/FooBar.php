<?php


namespace App;

class FooBar
{
    private int $numEnd;
    private int $numStart;
    private int $fooNumber = 3;
    private int $barNumber = 5;
    private string $foo = 'Foo';
    private string $bar = 'Bar';


    public function __construct(int $numEnd)
    {
        $this->numEnd = $numEnd;
        $this->numStart =$numEnd;
    }

    public function start(): string
    {
        $returnString = '';
        for ($i = $this->numStart; $i <= $this->numEnd; $i++) {
            if ($i % $this->fooNumber == 0) {
                $returnString .= $this->foo . ' ';
            } elseif ($i % $this->barNumber == 0) {
                $returnString .= $this->bar . ' ';
            } else {
                $returnString .= $i . ' ';
            }
        }
        return trim($returnString);
    }



}