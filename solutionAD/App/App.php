<?php


class App
{

    public $skaitlis;

    public function __construct($skaitlis)
    {
        $this->skaitlis = $skaitlis;
    }


    public function getResult()
    {
       // throw new Exception();

        $nibba='';
        $skaitlis3 = $this->skaitlis;
        $skaitlis3 %= 3;
        if ($skaitlis3 == 0)
            $nibba.= 'Foo';



            $skaitlis5 = $this->skaitlis;
            $skaitlis5 %= 5;
            if ($skaitlis5 == 0)
            {
                if ($nibba == 'Foo')
                {
                    $nibba .= ', ';
                }
                $nibba .= 'Bar';
            }

            return $nibba;



    }
}


