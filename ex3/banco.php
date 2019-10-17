<?php

//coneccao
$tabela = array();

class Coon {
 
    public static $instance;
 
    private function __construct() {
        //
    }
 
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new PDO('mysql:host=localhost;
            dbname=comumed', 'root', '',
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, 
            PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, 
            PDO::NULL_EMPTY_STRING);
        }
 
        return self::$instance;
    }

    public static function lastInsertId(){
        return  self::$instance->lastInsertId();
    }
 
}

function Inserir($nome,$total,$um,$dois,$tres,$quatro,$cinco,$seis,$idade,$tipo) {
    try {
        $sql = "INSERT INTO `simu` 
            (`ID`, `nome`, `total`, `18`, `23`, `28`, `38`, `53`, `54`, `idade`, `tipo`)
            VALUES 
            (NULL, '$nome', '$total', '$um', '$dois', '$tres', '$quatro', '$cinco', '$seis', '$idade',$tipo);";

        $p_sql = Coon::getInstance()->prepare($sql);

        //tem que retornar o id adicionado;

        $p_sql->execute();

        return "OK";

    } catch (Exception $e) {
        print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        }
}


if(isset($_GET['metodo']))
{
    if($_GET['metodo']=="1"){
        $tabela = array(
            "0-18"=>193.00,
            "19-23"=>221.00,
            "24-28"=>255.00,
            "29-38"=>337.00,
            "39-53"=>616.00,
            "54mais"=>800.00,
        );

        $nome = $_POST['Nome'];
        $um = $_POST['0-18'];
        $dois = $_POST['19-23'];
        $tres = $_POST['24-28'];
        $quatro = $_POST['29-38'];
        $cinco = $_POST['39-53'];
        $seis = $_POST['54mais'];

        $total= $_POST['Total'];
        $idade = $_POST[''];

        $tipo = $_GET['metodo'];

        echo "Sucesso: ".Inserir($nome,$total,$um,$dois,$tres,$quatro,$cinco,$seis,$idade,$tipo);

        //sleep(5);
        header("Location: enf.html");
    }
    if($_GET['metodo']=="2"){
        $tabela = array(
            "0-18"=>282.00,
            "19-23"=>325.00,
            "24-28"=>373.00,
            "29-38"=>494.00,
            "39-53"=>902.00,
            "54mais"=>1200.00,
        );

        $nome = $_POST['Nome'];
        $um = $_POST['0-18'];
        $dois = $_POST['19-23'];
        $tres = $_POST['24-28'];
        $quatro = $_POST['29-38'];
        $cinco = $_POST['39-53'];
        $seis = $_POST['54mais'];

        $total= $_POST['Total'];
        $idade = $_POST['Total'];

        $tipo = $_GET['metodo'];

        echo "Sucesso: ".Inserir($nome,$total,$um,$dois,$tres,$quatro,$cinco,$seis,$idade,$tipo);


        //sleep(5);
        header("Location: Ape.html");
    }
}
else
{
    header("Location: javascript:history.back(1)");
}
//echo "Sucesso: ".Inserir('mar','150',1,2,3,4,5,6,19,1);


?>