<?php
    /**
     * Created by PhpStorm.
     * User: Lua Azul
     * Date: 11/09/2019
     * Time: 00:29
     */

    $nome= $_POST['contact_name'];
    $email= $_POST['contact_email'];
    $pass= $_POST['contact_password'];

    //salva no SQL:

    require("../model/Clientes.php");

    class Clientes
    {
        public $nome;
        public $cpf;//not user
        public $email;
        public $senha;

        public static $instance;
    
        public static function getInstance() {
            if (!isset(self::$instance))
                self::$instance = new Clientes();
    
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
                
                return  Coon::lastInsertId();

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

    $noovo = new Clientes();

    $noovo->nome = $nome;
    $noovo->email = $email;
    $noovo->senha = $pass;

    //pega o id do usuario:

    $id = $noovo->Inserir();

    //salvar foto!
    if ( isset( $_FILES[ 'contact_img' ][ 'name' ] ) && $_FILES[ 'contact_img' ][ 'error' ] == 0 )
    {
        echo 'Você enviou o arquivo: <strong>' . $_FILES[ 'contact_img' ][ 'name' ] . '</strong><br />';
        echo 'Este arquivo é do tipo: <strong > ' . $_FILES[ 'contact_img' ][ 'type' ] . ' </strong ><br />';
        echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ 'contact_img' ][ 'tmp_name' ] . '</strong><br />';
        echo 'Seu tamanho é: <strong>' . $_FILES[ 'contact_img' ][ 'size' ] . '</strong> Bytes<br /><br />';
        $arquivo_tmp = $_FILES[ 'contact_img' ][ 'tmp_name' ];
        $nome = $_FILES[ 'contact_img' ][ 'name' ];
        // Pega a extensão
        $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
        // Converte a extensão para minúsculo
        $extensao = strtolower ( $extensao );
        // Somente imagens, .jpg;.jpeg;.gif;.png
        // Aqui eu enfileiro as extensões permitidas e separo por ';'
        // Isso serve apenas para eu poder pesquisar dentro desta String
        if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
            // Cria um nome único para esta imagem
            // Evita que duplique as imagens no servidor.
            // Evita nomes com acentos, espaços e caracteres não alfanuméricos
            $novoNome = $id. '.' . $extensao;
            // Concatena a pasta com o nome
            $destino = '../img/cliente/' . $novoNome;
            // tenta mover o arquivo para o destino
            if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
                echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
                echo '<img src ="' . $destino . '" />';
                header("Location: ..\index.php");
            }
            else
                echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
        }
        else
            echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
    }
    else
        echo 'Você não enviou nenhum arquivo!';

?>