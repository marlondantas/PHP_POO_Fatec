<?php
class perimetro{
    public function retangulo($h,$b){
		echo "RETANGULO";
        return 2*($h+$b);
    } 
    public function quadrado($a){
		echo "QUADRADO";
        return 4*($a);
    } 
    public function paralelogramo($a,$b){
		echo "PARALELOGRAMA";
        return 2*($a+$b);
    } 
    public function trapezio($a,$b,$c,$B){
		echo "TRAPÉZIO";
        return ($a+$b+$c+$B);
    } 
}
?>