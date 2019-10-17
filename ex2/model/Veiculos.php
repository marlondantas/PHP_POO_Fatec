<?php
    /**
     * Created by PhpStorm.
     * User: Lua Azul
     * Date: 06/09/2019
     * Time: 00:41
     */

    namespace concessionary;

    require_once ("Conn.php");

    class Veiculos
    {
        public $marca;
        public $modelo;
        public $valor;

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
                $sql = "INSERT INTO veiculos (       
                    `marca`,`modelo`,`valor`) 
                    VALUES (
                    :marca,:modelo,:valor)";
    
                $p_sql = Coon::getInstance()->prepare($sql);
    
                $p_sql->bindValue(":marca", $this->marca);
                $p_sql->bindValue(":modelo", $this->modelo);
                $p_sql->bindValue(":valor", $this->valor);   
    
                $p_sql->execute();
                
                return  Coon::lastInsertId();

            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
                }
        }

        public function Buscar() {
            try {
                $sql = "SELECT * FROM veiculos";
                $p_sql = Coon::getInstance()->prepare($sql);
                // $p_sql->bindValue(":cod", $user);

                $p_sql->execute();

                // return $this->populaUsuario($p_sql->fetch(PDO::FETCH_ASSOC));
                return $p_sql->execute();
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação(Buscar), foi gerado um LOG do mesmo, tente novamente mais tarde.";
                }
        }


    }