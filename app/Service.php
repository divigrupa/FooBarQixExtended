<?php
namespace App;

class Service
{
    private array $options = [
        'Foo' => 3,
        'Bar' => 5,
        'Qix' => 7
    ];

    public function checkIfMultiple(int $number): string
    {
        $result = '';
        foreach ($this->options as $key => $value){
            if($number % $value === 0){
                $result .= $key;
            }
        }

        if(strlen($result) === 0){
            return $number;
        } else{
            return $result;
        }
    }

    public function checkIfContainsMultiple(int $number): string
    {
        $result = '';
        $digits = str_split($number, 1);

        foreach ($digits as $digit){
            if(in_array($digit, $this->options)){
                $key = array_search($digit, $this->options);
                $result .= $key;
            }
        }

        return $result;
    }

    public function verifyNumber(int $number): string
    {
        return '';
    }

}