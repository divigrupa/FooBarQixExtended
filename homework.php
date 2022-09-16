<?php
class HomeWork
{
    function MultipleCheckTask(int $value, array $arr) : array
    {
        $res = [];

        foreach($arr as $multiple => $text)
            if ($value % $multiple === 0)
                $res[] = $text;

        return $res;
    }

    function ContainCheckTask(int $value, array $arr) : array
    {
        $res = [];

        while($value > 0)
        {
            [$value, $key] = [intdiv($value, 10), $value % 10];

            if (array_key_exists($key, $arr))
                $res[] = $arr[$key];
        }

        return array_reverse($res);
    }

    function SumDigits(int $value) : int
    {
        $sum = 0;
        while($value > 0)
        {
            $sum += $value % 10;
            $value = intdiv($value, 10);
        }
        return $sum;
    }
    

    function Task(int $value) : string
    {
        $rules = [3 => 'Foo', 5 => 'Bar', 7 => 'Qix'];
        $delimiter = ', ';

        $res = $this->MainProcess($value, $rules);

        if (count($res))
            return join($delimiter, $res);
        else
            return (string)$value;
    }

    function NewTask(int $value) : string
    {
        $rules = [8 => 'Inf', 7 => 'Qix', 3 => 'Foo'];
        $delimiter = '; ';


        $res = $this->MainProcess($value, $rules);

        if (count($res))
        {
            $ret = join($delimiter, $res);
            if ($this->SumDigits($value) % 8 === 0)
                $ret = $ret . 'Inf';
            return $ret;
        }
        else
            return (string)$value;
    }




    function MainProcess(int $value, array $rules) : array
    {
        if ($value <= 0)
            throw new InvalidArgumentException('Input value must be positive integer');

        $res = [];

        $checkFunctions = ['MultipleCheckTask', 'ContainCheckTask'];

        foreach($checkFunctions as $func)
        {
            $ret = $this->$func($value, $rules);
            $res = [...$res, ...$ret];
        }

        return $res;
    }
}

?>