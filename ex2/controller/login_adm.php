<?php
    /**
     * Created by PhpStorm.
     * User: Lua Azul
     * Date: 11/09/2019
     * Time: 01:26
     */

    session_start();

    
    include("../model/Usuario.php");
    
    $email= $_POST['login_email'];
    $pass = $_POST['login_password'];
    
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
                $sql = "SELECT * FROM usuarios WHERE `user` = '$user' and `password` = '$senha';";

                $p_sql = Coon::getInstance()->prepare($sql);

                $p_sql->bindValue(":user", $user);
                $p_sql->bindValue(":pass", $senha);

                print_r($p_sql);
                $p_sql->execute();

                // return $this->populaUsuario($p_sql->fetch(PDO::FETCH_ASSOC));    

                    echo "numero de colunos BUSCAR". $p_sql->rowCount();

                return $p_sql->rowCount();
            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação(Buscar), foi gerado um LOG do mesmo, tente novamente mais tarde.";
                }
        }
    
    }

    $loginn = new Usuario();

    $gf = $loginn->Buscar($email,$pass);

    echo "Numero de colunas ".$gf;
    
    if($gf == 1){

        $_SESSION['user'] = '1';
        $_SESSION['nome'] = 'ADM';

        header("Location: ..\index.php");
    }
    else
    {
        header("Location: ..\index.php?erro=true");

    }
?>