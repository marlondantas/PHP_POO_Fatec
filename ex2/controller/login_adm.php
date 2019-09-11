<?php
    /**
     * Created by PhpStorm.
     * User: Lua Azul
     * Date: 11/09/2019
     * Time: 01:26
     */

    session_start();

    $_SESSION['user'] = '1';


    header("Location: ..\index.php");
?>