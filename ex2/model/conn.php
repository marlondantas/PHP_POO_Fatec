<?php
    /**
     * Created by PhpStorm.
     * User: Lua Azul
     * Date: 06/09/2019
     * Time: 00:49
     */

    $conn = new PDO("mysql:host=localhost;dbname=concessionaria", "root", "");

    $stmt = $conn->prepare("INSERT INTO `usuarios` (`ID`, `user`, `password`, `nome`) VALUES (NULL, ?, ?, ?);");
    $admin = "admin";
    $stmt->bindParam(1,$admin);
    $stmt->bindParam(2,$admin);
    $stmt->bindParam(3,$admin);
    $stmt->execute();

?>