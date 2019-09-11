<?php
    /**
     * Created by PhpStorm.
     * User: Lua Azul
     * Date: 11/09/2019
     * Time: 01:27
     */
    session_start();
    session_destroy();

    $_SESSION['user'] = '0';

    header("Location: ..\index.php");


    ?>