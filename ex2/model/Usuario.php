<?php
    /**
     * Created by PhpStorm.
     * User: Lua Azul
     * Date: 06/09/2019
     * Time: 00:37
     */

    namespace concessionary;

    require_once ("Conn.php");

    use Coon;

    class Usuario{
        
        public $user;
        public $password;
        public $nome;

        public static $instance;
    
        public static function getInstance() {
            if (!isset(self::$instance))
                self::$instance = new DaoUsuario();
    
            return self::$instance;
        }
    
        public function Inserir() {
            try {
                $sql = "INSERT INTO usuarios (       
                    `user`,
                    `password`,
                    `nome`) 
                    VALUES (
                    :user,
                    :passwor,
                    :nome)";
    
                $p_sql = Coon::getInstance()->prepare($sql);
    
                $p_sql->bindValue(":user", $this->user);
                $p_sql->bindValue(":passwor", $this->password);
                $p_sql->bindValue(":nome", $this->nome);   
    
                $p_sql->execute();
                return $p_sql->lastInsertId();

            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
                }
        }

        public function Buscar($user,$senha) {
            try {
                $sql = "SELECT * FROM usuarios WHERE `user` = ':user' and `password` = ':pass';";
                $p_sql = Coon::getInstance()->prepare($sql);
                $p_sql->bindValue(":user", $user);
                $p_sql->bindValue(":pass", $senha);

                $p_sql->execute();

                // return $this->populaUsuario($p_sql->fetch(PDO::FETCH_ASSOC));
                return $p_sql->execute();
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação(Buscar), foi gerado um LOG do mesmo, tente novamente mais tarde.";
                }
        }
    
    }
 