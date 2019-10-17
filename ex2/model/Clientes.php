<?php
    /**
     * Created by PhpStorm.
     * User: Lua Azul
     * Date: 06/09/2019
     * Time: 00:42
     */

    namespace concessionary;

    require_once ("Conn.php");

    use Coon;
    
    class Clientes
    {
        public $nome;
        public $cpf;//not user
        public $email;
        public $senha;

        public static $instance;
    
        private function __construct() {
            //
        }
    
        public static function getInstance() {
            if (!isset(self::$instance))
                self::$instance = new DaoUsuario();
    
            return self::$instance;
        }
    
        public function Inserir() {
            try {
                $sql = "INSERT INTO clientes (       
                    `nome`,
                    `email`,
                    `password`) 
                    VALUES (
                    :nome,
                    :email,
                    :passwor)";
    
                $p_sql = Coon::getInstance()->prepare($sql);
    
                $p_sql->bindValue(":nome", $this->nome);
                $p_sql->bindValue(":passwor", $this->senha);
                $p_sql->bindValue(":email", $this->email);   
    
                //tem que retornar o id adicionado;

                $p_sql->execute();
                return $p_sql->lastInsertId();

            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
                }
        }

        public function Buscar($user,$senha) {
            try {
                $sql = "SELECT * FROM clientes WHERE `user` = :cod";
                $p_sql = Coon::getInstance()->prepare($sql);
                $p_sql->bindValue(":cod", $user);

                $p_sql->execute();

                // return $this->populaUsuario($p_sql->fetch(PDO::FETCH_ASSOC));
                return $p_sql->execute();
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação(Buscar), foi gerado um LOG do mesmo, tente novamente mais tarde.";
                }
        }
        
    }