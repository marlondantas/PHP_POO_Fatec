<?php
    /**
     * Created by PhpStorm.
     * User: Lua Azul
     * Date: 06/09/2019
     * Time: 00:49
     */

    namespace concessionary;


    class conn
    {
        public $host ='localhost';
        public $user = 'root';
        public $pass = '';
        public $base = 'concessionaria';

        public $con = new PDO("mysql:host=localhost;dbname=exercicio", "root", "senha");

    }