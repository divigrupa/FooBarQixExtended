<?php

declare(strict_types=1);

class Logic
{
    private $foo = 'Foo';
    private $bar = 'Bar';
    private $qix = 'Qix';
    private $result = '';
    
    public function serviceFooBarQixMain(int $input)
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
    
    public function serviceFooBarQixOld(int $input)
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
    
    public function serviceFooBarQixNew(int $input)
    {
        $arrayOccurances = [];
        
        if ($input <= 0)
        {
            throw new InvalidArgumentException(
                'Only positive integers allowed!'
            );
        }
        
        if (preg_match('/3/', strval($input))) {
            $arrayOccurances[strpos(strval($input), '3')] = $this->foo;
        }
        
        if (preg_match('/5/', strval($input))) {
            $arrayOccurances[strpos(strval($input), '5')] = $this->bar;
        }
        
        if (preg_match('/7/', strval($input))) {
            $arrayOccurances[strpos(strval($input), '7')] = $this->qix;
        }
        
        ksort($arrayOccurances);
        $this->result = implode($arrayOccurances);
        
        if (
            (!preg_match('/3/', strval($input)))
            && !preg_match('/5/', strval($input))
            && !preg_match('/7/', strval($input))) {
           $this->result = strval($input);
        }
        
        return $this->result;
    }
}