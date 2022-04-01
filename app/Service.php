<?php
namespace App;

class Service
{
    public function checkIfMultiple(int $number): string
    {
        $options = [
            'Foo' => 3,
            'Bar' => 5,
            'Qix' => 7
        ];

        $result = '';
        foreach ($options as $key => $value){
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
        return '';
    }


}