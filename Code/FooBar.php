<?php

class FooBar {
    
     function Checker($Number):string
    {
        try {
        $Result = "";
            
            if ($Number % 3 == 0 && $Number % 5 == 0 && $Number % 7 ==0)
            $Result = "Foo, Bar, Qix ";
        
            elseif ($Number % 5 == 0 && $Number % 3==0)
            $Result = "Foo, Bar ";

            elseif ($Number % 5 == 0 && $Number % 7==0)
            $Result = "Bar, Qix ";

            elseif ($Number % 3 == 0 && $Number % 7==0)
            $Result = "Foo, Qix ";
            
            elseif ($Number % 3 == 0)
            $Result = "Foo ";

            elseif ($Number % 5 == 0)
            $Result = "Bar ";

            elseif ($Number % 7 == 0)
            $Result = "Qix ";
        
            else 
            $Result = "";

            return 
            $Result ;
            }

            catch (Exception $e){
            return
            $Result = "";
            }
        }
 
        
    function FooBarAppend($number):string {
        $Result = $this -> Checker($number) ;
        $DigitArray = str_split($number);
        $Foo=true;
        $Bar=true;
        $Qix=true;

        for ($i=0; $i<count($DigitArray); $i++){ 
                        
            if ($DigitArray[$i]==3 && $Foo==true){
                $Foo=false;
                $Result .= "Foo";                                                     
            }

            if ($DigitArray[$i]==7 && $Bar==true){
                $Bar=false;
                $Result .= "Qix";
            }
            if ($DigitArray[$i]==5 && $Qix==true){
                $Qix=false;
                $Result .= "Bar";
            }
        }
    return $Result;
    } 
    
    function InfQix($Number):string{
        try {
            $Result = "";
                
                if ($Number % 3 == 0 && $Number % 8 == 0 && $Number % 7 ==0)
                $Result = "Inf; Qix; Foo; ";
            
                elseif ($Number % 8 == 0 && $Number % 3==0)
                $Result = "Inf; Foo; ";
    
                elseif ($Number % 8 == 0 && $Number % 7==0)
                $Result = "Inf; Qix; ";
    
                elseif ($Number % 3 == 0 && $Number % 7==0)
                $Result = "Qix; Foo; ";
                
                elseif ($Number % 3 == 0)
                $Result = "Foo; ";
    
                elseif ($Number % 8 == 0)
                $Result = "Inf; ";
    
                elseif ($Number % 7 == 0)
                $Result = "Qix; ";
            
                else 
                $Result = "";
    
                return 
                $Result ;
                }
    
                catch (Exception $e){
                return
                $Result = "";
                }
            }
    
    function InfQixAppend($number):string {
        $Result = $this -> InfQix($number) ;
        $DigitArray = str_split($number);
        $Foo=true;
        $Inf=true;
        $Qix=true;
        $Counter =0;

        for ($i=0; $i<count($DigitArray); $i++){ 
            $Counter += $DigitArray[$i];            
            
                            if ($DigitArray[$i]==3 && $Foo==true){
                                $Foo=false;
                                $Result .= "Foo";                                                     
                            }

                            if ($DigitArray[$i]==7 && $Inf==true){
                                $Inf=false;
                                $Result .= "Qix";
                            }
                            if ($DigitArray[$i]==8 && $Qix==true){
                                $Qix=false;
                                $Result .= "Inf";
                            }
                        }

        if ($Counter%8==0)             
        $Result .= "Inf";     

    return $Result;
    }     
}
    