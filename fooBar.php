<?php
class FooBar
{
    function checkFooBar($number)
    {
        $result = "";
        if ((is_int($number) || ctype_digit($number)) && (int)$number > 0)
        {
            if (($number % 3) == 0)
            {
                $result = "Foo";
            }
            if (($number % 5) == 0)
            {
                $result .= "Bar";
            }
            if ((($number % 5) !== 0) && (($number % 3) !== 0))
            {
                $result = strval($number);
            }
        }
        else
        {
            throw new Exception();
        }
        return $result;
    }
}

?>
