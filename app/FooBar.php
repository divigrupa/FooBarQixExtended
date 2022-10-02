<?php

namespace App;

class FooBar
{

    private int $num;
    private const FOO = 3;
    private const BAR = 5;
    private const QIX = 7;
    private const SFOO = "FOO";
    private const SBAR = "BAR";
    private const SQIX = "QIX";


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
        if ($this->num % self::BAR) {
            $changedArray = self::SBAR;
        }
        if ($this->num % self::QIX) {
            $changedArray = self::SQIX;
        }
        if (!$changedArray) {
            for ($i = 0; $i < count($split); $i++) {
                if ($split[$i] == self::FOO) {
                    $changedArray[] = self::SFOO;
                }
                if ($split[$i] == self::BAR) {
                    $changedArray[] = self::SBAR;
                }
                if ($split[$i] == self::QIX) {
                    $changedArray[] = self::SQIX;
                }
            }
            if (!$changedArray) {
                $changedArray[] = strval($this->num);
            }
        }
        return implode("", $changedArray);
    }
}