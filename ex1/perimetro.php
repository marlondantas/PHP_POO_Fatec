<?php

class perimetro{

    public function retangulo($h,$b){
        return 2*($h+$b);
    } 
    public function quadrado($a){
        return 4*($a);
    } 
    public function paralelogramo($a,$b){
        return 2*($a+$b);
    } 
    public function trapezio($a,$b,$c,$B){
        return ($a+$b+$c+$B);
    } 
}

?>