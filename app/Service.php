<?php
namespace App;

class Service
{
    public function checkIfMultiple(int $number): string
    {
        $foo = 3;
        $resultFoo = 'Foo';

        $bar = 5;
        $resultBar = 'Bar';

        if($number % $foo === 0 && $number % $bar === 0){
            $result = $resultFoo . ', ' . $resultBar;
        } elseif ($number % $foo === 0){
            $result = $resultFoo;
        } elseif ($number % $bar === 0){
            $result = $resultBar;
        } else{
            $result = $number;
        }

        return $result;
    }
}