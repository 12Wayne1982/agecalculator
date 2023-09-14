<?php
    function calcAge(int $GEBURTSJAHR, int $GEBURTSMONAT, int $GEBURTSTAG){
        if($GEBURTSMONAT < date("m")){
                $age = (date("Y") - $GEBURTSJAHR);  
        }
        if($GEBURTSMONAT == date("m")){
                if(date("d") < $GEBURTSTAG){
                        $age = (date("Y") - $GEBURTSJAHR) - 1;     
                } 
                if(date("d") == $GEBURTSTAG || date("d") > $GEBURTSTAG){
                        $age = date("Y") - $GEBURTSJAHR;   
                }
                // if(date("d") > $GEBURTSTAG){
                //         $age = date("Y") - $GEBURTSJAHR;   
                // }   
        }
        if($GEBURTSMONAT > date("m")){
                $age = date("Y") - $GEBURTSJAHR - 1;
        }
        return $age;
    }
?>