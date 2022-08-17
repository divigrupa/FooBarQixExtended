<?php  declare(strict_types=1);


namespace App;





class FooBar
{
    private int $numEnd;
    private int $numStart;
    private int $fooNumber = 3;
    private int $barNumber = 5;
    private int $qixNumber = 7;
    private string $foo = 'Foo';
    private string $bar = 'Bar';
    private string $qix = 'Qix';


    public function __construct(int $numEnd)
    {
        $this->numEnd = $numEnd;
        $this->numStart = $numEnd;
    }

    public function start(): string
    {
        $stringOfNumbers = '';
        $transformedString = '';

        for ($i = $this->numStart; $i <= $this->numEnd; $i++) {
            if ($i % $this->fooNumber == 0) {
                $transformedString .= $this->foo . ' ';
            } if ($i % $this->barNumber == 0) {
               $transformedString .= $this->bar . ' ';
            } if ($i % $this->qixNumber == 0) {
                $transformedString .= $this->qix . ' ';
            }
            $stringOfNumbers .= $i . ' ';

        }



        return trim($stringOfNumbers . $transformedString);

    }
}



