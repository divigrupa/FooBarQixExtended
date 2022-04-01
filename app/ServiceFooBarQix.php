<?php
namespace App;

class ServiceFooBarQix
{
    private array $fooBarQix = [
        'Foo' => 3,
        'Bar' => 5,
        'Qix' => 7
    ];

    private string $separator = ', ';

    public function checkIfMultiple(int $number): string
    {
        $result = '';
        foreach ($this->fooBarQix as $key => $value){
            if($number % $value === 0){
                $result .= $key . $this->separator;
            }
        }

        if(strlen($result) === 0){
            return $number;
        } else{
            return rtrim($result, ', ');
        }
    }

    public function checkIfContainsMultiple(int $number): string
    {
        $result = '';
        $digits = str_split($number, 1);

        foreach ($digits as $digit){
            if(in_array($digit, $this->fooBarQix)){
                $key = array_search($digit, $this->fooBarQix);
                $result .= $key . $this->separator;
            }
        }

        return rtrim($result, ', ');
    }

    public function verifyNumberIsFooBarQix(int $number): string
    {
        $result = $this->checkIfMultiple($number) . ', ';
        $result .= $this->checkIfContainsMultiple($number);

        return $result;
    }

}