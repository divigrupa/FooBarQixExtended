<?php

class FooBar
{

    // OLD RULES

    public function foo($cash):string
    {
        $str = "";
        if($cash % 3 == 0){
            $str = "Foo";
         }
        return $str ;
    }
    
    private function bar($cash):string
    {
        $str = "";
        if($cash % 5 == 0){
            $str = "Bar";
         }
        return $str ;
    }

    private function qix($cash):string
    {
        $str = "";
        if($cash % 7 == 0){
            $str = "Qix";
         }
        return $str ;
    }

    //Foo, Bar, Qix together

    public function foo_bar_qix($cash):string
    {
        $str = $this->foo($cash);
        $str .= $this->bar($cash);
        $str .= $this->qix($cash);

        if(strlen($str) == 0){
            $str = $cash;
        }
        return $str;
    }

}
?>