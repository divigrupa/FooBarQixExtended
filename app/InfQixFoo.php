<?php

namespace App;

class InfQixFoo
{

    private int $num;
    private const FOO = 3;
    private const QIX = 7;
    private const INF = 8;
    private const SFOO = "FOO";
    private const SQIX = "QIX";
    private const SINF = "INF";


    public function __construct(int $num)
    {
        $this->num = $num;
    }

    public function print(): string
    {
        $split = str_split(strval($this->num));
        $changedArray = [];
        if ($this->num % self::FOO) {
            $changedArray = self::SFOO;
        }
        if ($this->num % self::INF) {
            $changedArray = self::SINF;
        }
        if ($this->num % self::QIX) {
            $changedArray = self::SQIX;
        }
        if (!$changedArray) {
            for ($i = 0; $i < count($split); $i++) {
                if ($split[$i] == self::FOO) {
                    $changedArray[] = self::SFOO;
                }
                if ($split[$i] == self::INF) {
                    $changedArray[] = self::SINF;
                }
                if ($split[$i] == self::QIX) {
                    $changedArray[] = self::SQIX;
                }
            }
            if (!$changedArray) {
                $changedArray[] = strval($this->num);
            }
        }
        if($changedArray) {
            if (array_sum(str_split($this->num)) % self::INF == 0) {
                $changedArray[sizeof($changedArray)-1] = $changedArray[sizeof($changedArray)-1] . self::SINF;
            }
        }
        return implode(";", $changedArray);
    }
}