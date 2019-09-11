<?php

//include("imp.php");
//
//$sd = new views();
//
//echo "Class INVOCADA >:";
//
//$sd->impPhoto('UNO','FIAT','1500.00','001.jpg');
//$sd->impPhoto('Ferrari','TestaRossa!','463 MIL','002.jpg');

    require ("../model/Usuario.php");

//    $cone = new \concessionary\Usuario();
//    $cone->connect();


    $conn = new PDO(
        'mysql:host=localhost;dbname=concessionaria', 'root', ''
    );

    $stmt = $conn->prepare("SELECT * FROM `usuarios`");
    $stmt->execute();
    while($row = $stmt->fetch()) {
        echo "q";
        print_r($row);
    }
?>