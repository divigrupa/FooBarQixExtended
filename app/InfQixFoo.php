<?php

namespace App;

class InfQixFoo
{
    private const CaseOfEight = "Inf";
    private const CaseOfThree = "Foo";
    private const CaseOfSeven = "Qix";
    private const FooNumber = 3;
    private const InfNumber = 8;
    private const QixNumber = 7;
    public function execute(int $number): string
    {
        $splitNumber = str_split((string)$number);
        $result = [];
        if ($number > 0) {
            if ($number % self::InfNumber == 0) {
                $result[] = self::CaseOfEight;
            }
            if ($number % self::QixNumber == 0) {
                $result[] = self::CaseOfSeven;
            }
            if ($number % self:: FooNumber == 0) {
                $result[] = self::CaseOfThree;
            }
            if (!$result) {
                for($i=0;$i<count($splitNumber);$i++){
                    if($splitNumber[$i] == self::FooNumber){
                        $result[] = self::CaseOfThree;
                    }
                    if($splitNumber[$i] == self::InfNumber){
                        $result[] = self::CaseOfEight;
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
        return implode(';', $result);
    }
}