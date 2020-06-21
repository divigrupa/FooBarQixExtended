<?php

declare(strict_types=1);

class Logic
{
    private $foo = 'Foo';
    private $bar = 'Bar';
    private $qix = 'Qix';
    private $inf = 'Inf';
    private $result = '';
    
    public function serviceInfQixFoo(int $input)
    {
        $this->result = '';
        $arrayOccurances = [];
        $arrayDigits = [];
        
        if ($input <= 0)
        {
            throw new InvalidArgumentException(
                'Only positive integers allowed!'
            );
        }
        
        if ($input % 8 == 0) {
            $this->result = $this->inf;
        }
        
        if ($input % 7 == 0) {
            $this->result .= ($this->result ? '; ' : '') . $this->qix;
        }
        
        if ($input % 3 == 0) {
            $this->result .= ($this->result ? '; ' : '') . $this->foo;
        }
        
        if (preg_match('/8/', strval($input))) {
            $arrayOccurances[strpos(strval($input), '8')] = $this->inf;
        }
        
        if (preg_match('/7/', strval($input))) {
            $arrayOccurances[strpos(strval($input), '7')] = $this->qix;
        }
        
        if (preg_match('/3/', strval($input))) {
            $arrayOccurances[strpos(strval($input), '3')] = $this->foo;
        }
        
        ksort($arrayOccurances);
        $this->result .= implode($arrayOccurances);
        
        if ($input % 8 != 0
            && $input % 7 != 0
            && $input % 3 != 0
            && !preg_match('/8/', strval($input))
            && !preg_match('/7/', strval($input))
            && !preg_match('/3/', strval($input))) {
           $this->result = strval($input);
        }
        
        $arrayDigits = str_split(strval($input));
        
        if (array_sum($arrayDigits) % 8 == 0)
        {
            $this->result .= 'Inf';
        }
        
        return $this->result;
    }
    
    public function serviceFooBarQixMain(int $input)
    {
        $this->result = '';
        $arrayOccurances = [];
        
        if ($input <= 0)
        {
            throw new InvalidArgumentException(
                'Only positive integers allowed!'
            );
        }
        
        if ($input % 3 == 0) {
            $this->result = $this->foo;
        }
        
        if ($input % 5 == 0) {
            $this->result .= $this->bar;
        }
        
        if ($input % 7 == 0) {
            $this->result .= $this->qix;
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
        $this->result .= implode($arrayOccurances);
        
        if ($input % 3 != 0
            && $input % 5 != 0
            && $input % 7 != 0
            && !preg_match('/3/', strval($input))
            && !preg_match('/5/', strval($input))
            && !preg_match('/7/', strval($input))) {
           $this->result = strval($input);
        }
        
        return $this->result;
    }
    
    public function serviceFooBarQixOld(int $input)
    {
        $this->result = '';
        if ($input <= 0)
        {
            throw new InvalidArgumentException(
                'Only positive integers allowed!'
            );
        }
        
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
        $this->result = '';
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
        
        if (!preg_match('/3/', strval($input))
            && !preg_match('/5/', strval($input))
            && !preg_match('/7/', strval($input))) {
           $this->result = strval($input);
        }
        
        return $this->result;
    }
}