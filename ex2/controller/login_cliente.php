<?php
    /**
     * Created by PhpStorm.
     * User: Lua Azul
     * Date: 11/09/2019
     * Time: 01:26
     */

    session_start();

    
    include("../model/Clientes.php");
    
    $email = $_POST['login_cli_email'];
    $senha = $_POST['login_cli_password'];
    
    class Clientes
    {
        public $nome;
        public $cpf;//not user
        public $email;
        public $senha;

        public static $instance;

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
                $sql = "SELECT * FROM clientes WHERE `email` = '$user' and `password` = '$senha';";
                echo $sql;


                $p_sql = Coon::getInstance()->prepare($sql);
                $p_sql->execute();
                echo $p_sql->rowCount();
                // return $this->populaUsuario($p_sql->fetch(PDO::FETCH_ASSOC));
                return $p_sql->rowCount();

            } catch (Exception $e) {
                print "Ocorreu um erro ao tentar executar esta ação(Buscar), foi gerado um LOG do mesmo, tente novamente mais tarde.";
                }
        }
        
    }


    $loginn = new Clientes();

    $gf = $loginn->Buscar($email,$senha);

    
    if($gf == 1){

        $_SESSION['user'] = '0';
        $_SESSION['nome'] = 'Cliente';

        header("Location: \\ex2\\index.php");
    }
    else
    {
        header("Location: \\ex2\\index.php?erro=true");

    }
?>