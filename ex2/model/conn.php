<?php
    /**
     * Created by PhpStorm.
     * User: Lua Azul
     * Date: 06/09/2019
     * Time: 00:49
     */

    // $conn = new PDO("mysql:host=localhost;dbname=concessionaria", "root", "");

    // $stmt = $conn->prepare("INSERT INTO `usuarios` (`ID`, `user`, `password`, `nome`) VALUES (NULL, ?, ?, ?);");
    // $admin = "admin";
    // $stmt->bindParam(1,$admin);
    // $stmt->bindParam(2,$admin);
    // $stmt->bindParam(3,$admin);
    // $stmt->execute();


    //fonte : https://www.devmedia.com.br/usando-pdo-php-data-objects-para-aumentar-a-produtividade/28446
    
    class Coon {
 
        public static $instance;
     
        private function __construct() {
            //
        }
     
        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new PDO('mysql:host=localhost;
                dbname=concessionaria', 'root', '',
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

?>