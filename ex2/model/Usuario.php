<?php
    /**
     * Created by PhpStorm.
     * User: Lua Azul
     * Date: 06/09/2019
     * Time: 00:37
     */

    namespace concessionary;

    require ("conn.php");

    class Usuario
    {
        private $conn;

        public $user;
        public $password;
        public $nome;

        public function create()
        {
            $sql= sprintf("");

        }

        public function read()
        {
            $sql= sprintf("");

        }

        public function reads()
        {
            $sql = sprintf("SELECT * FROM `usuarios`");
        }
        public function update()
        {
            $sql= sprintf("");

        }

        public function delete()
        {
            $sql= sprintf("");

        }
    }