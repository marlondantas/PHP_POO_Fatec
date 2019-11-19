<?php
session_start();

$hist = $_SESSION['hist'];


if(isset($_GET['placa']))
{
    $horaS = $_POST['horaS'];
    $pl = $_GET['placa'];

    echo "Carro placa: ".$pl." Foi Removido as: ".$horaS." Horas";

    $saida = array();

    foreach ($hist as &$value) 
    {
        if($value['placa'] == $pl)
        {
            $value['horaS'] = $horaS;  
            $value['tp'] = $value['horaS'] -$value['horaE'];
            $_SESSION['carro'] = $value;
        }

        array_push($saida,$value);

    }

    print_r($saida);
    echo ("<BR>");
    print_r($_SESSION['hist']);
    
    $_SESSION['hist'] = $saida;
    $_SESSION['QuantAtual']+=1;
    header("Location: start.php?s");
}

?>