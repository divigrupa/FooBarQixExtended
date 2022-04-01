<?php
namespace App;

class ServiceInfQixFoo
{

    private array $infQixFoo = [
        'Inf' => 8,
        'Qix' => 7,
        'Foo' => 3
    ];

    private string $separator = '; ';


    public function checkIfMultiple(int $number): string
    {
        $result = '';
        foreach ($this->infQixFoo as $key => $value){
            if($number % $value === 0){
                $result .= $key . $this->separator;
            }
        }

        if(strlen($result) === 0){
            return $number;
        } else{
            return rtrim($result, '; ');
        }
    }

    public function checkIfContainsMultiple(int $number): string
    {
        $result = '';
        $digits = str_split($number, 1);

        foreach ($digits as $digit){
            if(in_array($digit, $this->infQixFoo)){
                $key = array_search($digit, $this->infQixFoo);
                $result .= $key . $this->separator;
            }
        }

        return rtrim($result, '; ');
    }

    public function verifyNumberIsInfQixFoo(int $number): string
    {
        $result = $this->checkIfMultiple($number) . '; ';
        $result .= $this->checkIfContainsMultiple($number);

        return $result;
    }
}
