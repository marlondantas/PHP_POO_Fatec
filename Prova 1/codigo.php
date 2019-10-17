<?php

class codigo
{
    public static function Validar($codigo){
        $lista = str_split($codigo, 1);

        $total = 0;

        $total = $total + $lista[0]*1;
        $total = $total + $lista[1]*3;
        $total = $total + $lista[2]*1;
        $total = $total + $lista[3]*3;
        $total = $total + $lista[4]*1;
        $total = $total + $lista[5]*3;
        $total = $total + $lista[6]*1;
        $total = $total + $lista[7]*3;
        $total = $total + $lista[8]*1;
        $total = $total + $lista[9]*3;
        $total = $total + $lista[10]*1;
        $total = $total + $lista[11]*3;
         

        // echo "<h1>".($total)."</h1>";

        $divisao = $total / 10;

        // echo "<h2>Divisao: ".($divisao)."</h2>";

        $arredondamento = intval($divisao);

        // echo "<h2>arredondamento: ".($arredondamento)."</h2>";

        $soma = $arredondamento +1;

        // echo "<h2>soma: ".($soma)."</h2>";

        $Multiplique = $soma*10;

        // echo "<h2>Multiplique: ".($Multiplique)."</h2>";

        $Subtraia = $Multiplique - $total;

        // echo "<h2>Subtraia: ".($Subtraia)."</h2>";

        $digitoVerificador = $Subtraia;

        // echo "<h2>digitoVerificador: ".($digitoVerificador)."</h2>";

        if($digitoVerificador == $lista[12])
        {
            // echo "CERTO";
            return "CERTO";
        }
        else
        {
            // echo "ERRADO";
            return "ERRADO";
        }
        // print_r ($lista);
    }
}
?>