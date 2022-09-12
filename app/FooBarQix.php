<?php

namespace App;


class FooBarQix
{
    private const CaseOfThree = "Foo";
    private const CaseOfFive = "Bar";
    private const CaseOfSeven = "Qix";
    private const FooNumber = 3;
    private const BarNumber = 5;
    private const QixNumber = 7;

    public function execute(int $number): string
    {
        $splitNumber = str_split((string)$number);
        $result = [];
        if ($number > 0) {
            if ($number % self::FooNumber == 0) {
                $result[] = self::CaseOfThree;
            }
            if ($number % self::BarNumber == 0) {
                $result[] = self::CaseOfFive;
            }
            if ($number % self::QixNumber == 0) {
                $result[] = self::CaseOfSeven;
            }
            if (!$result) {
                for($i=0;$i<count($splitNumber);$i++){
                    if($splitNumber[$i] == self::FooNumber){
                        $result[] = self::CaseOfThree;
                    }
                    if($splitNumber[$i] == self::BarNumber){
                        $result[] = self::CaseOfFive;
                    }
                    if($splitNumber[$i] == self::QixNumber){
                        $result[] = self::CaseOfSeven;
                    }
                }
            }
            if (!$result) {
                $result[] = strval($number);
            }
        }
        return implode(',', $result);
    }
}