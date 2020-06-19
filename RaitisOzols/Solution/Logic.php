<?php

declare(strict_types=1);

class Logic
{
    private $foo = 'Foo';
    private $bar = 'Bar';
    private $qix = 'Qix';
    private $result;
    
    public function serviceFooBar(int $input)
    {
        if ($input <= 0)
        {
            throw new InvalidArgumentException(
                'Only positive integers allowed!'
            );
        }
        
        $this->result = '';
        
        if ($input % 3 == 0) {
            $this->result = $this->foo;
        }
        
        if ($input % 5 == 0) {
            $this->result .= $this->bar;
        }
        
        if ($input % 7 == 0) {
            $this->result .= $this->qix;
        }
        
        if ($input % 3 != 0 && $input % 5 != 0 && $input % 7 != 0) {
           $this->result = strval($input);
        }
        
        return $this->result;
    }
}