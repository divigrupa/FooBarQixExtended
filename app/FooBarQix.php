<?php

namespace App;


class FooBarQix
{
    private const MultipleByThree = "Foo";
    private const MultipleByFive = "Bar";
    private const MultipleBySeven = "Qix";
    private const FooNumber = 3;
    private const BarNumber = 5;
    private const QixNUmber = 7;
    public function execute(int $number): string
    {
        $result = [];
        if ($number > 0) {
            if ($number % self::FooNumber == 0) {
                $result[] = self::MultipleByThree;
            }
            if ($number % self::BarNumber == 0) {
                $result[] = self::MultipleByFive;
            }
            if($number % self::QixNUmber == 0){
                $result[] = self::MultipleBySeven;
            }
            if (!$result) {
                $result[] = strval($number);
            }
        }
        return implode(',', $result);
    }
}