<?php 
    session_start();

    if (!file_exists("img/")){
        mkdir("img/", 0700);
        }
    if (!file_exists("img/adm")){
        mkdir("img/adm/", 0700);
        }
    if (!file_exists("img/car/")){
        mkdir("img/car/", 0700);
        }
    if (!file_exists("img/cliente/")){
        mkdir("img/cliente/", 0700);
        }

    define('ROOT_PATH', dirname(__FILE__));

?>

<!DOCTYPE html>
<html lang="PT">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TRUCK - COLOR</title>

        <!-- load stylesheets -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
        <!-- Google web font "Open Sans" -->
        <link rel="stylesheet" href="view/font-awesome-4.5.0/css/font-awesome.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="view/css/bootstrap.min.css">
        <!-- Bootstrap style -->
        <link rel="stylesheet" href="view/css/hero-slider-style.css">
        <!-- Hero slider style (https://codyhouse.co/gem/hero-slider/) -->
        <link rel="stylesheet" href="view/css/magnific-popup.css">
        <!-- Magnific popup style (http://dimsemenov.com/plugins/magnific-popup/) -->
        <link rel="stylesheet" href="view/css/tooplate-style.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->


        <!-- load JS files -->
        <script src="view/js/jquery-1.11.3.min.js"></script>         <!-- jQuery (https://jquery.com/download/) -->
        <script src="https://www.atlasestateagents.co.uk/javascript/tether.min.js"></script> <!-- Tether for Bootstrap (http://stackoverflow.com/questions/34567939/how-to-fix-the-error-error-bootstrap-tooltips-require-tether-http-github-h) -->
        <script src="view/js/bootstrap.min.js"></script>             <!-- Bootstrap js (v4-alpha.getbootstrap.com/) -->
        <script src="view/js/hero-slider-main.js"></script>          <!-- Hero slider (https://codyhouse.co/gem/hero-slider/) -->
        <script src="view/js/jquery.magnific-popup.min.js"></script> <!-- Magnific popup (http://dimsemenov.com/plugins/magnific-popup/) -->


        <!--Icone da pagina-->
        <link rel="icon" type="imagem/png" href="icon.png" />

    </head>
<!--BODY-->
    <?php

        $arq = "view/Principal.html";

        if (isset($_SESSION['user'])){
            if($_SESSION['user']=='0'){
                //echo 'cliente';
                //cliente
                $arq = "view/cliente.html";
            }
            elseif ($_SESSION['user']=='1'){
                //adm
                $arq = "view/adm.html";
            }
        }

        $html = file_get_contents( $arq );

        //acessar biblioteca para pegar dados
        include ("controller/imp.php");

        $ds = new views();

        if (isset($_SESSION['nome'])){
        $html = str_replace('#{nome}', $_SESSION['nome'], $html);
        }
        
        $html = str_replace('#{lista_carros}', $ds->r_carros(), $html);

        echo $html;
    ?>
</html>
