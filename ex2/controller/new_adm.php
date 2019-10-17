<?php
    /**
     * Created by PhpStorm.
     * User: Lua Azul
     * Date: 11/09/2019
     * Time: 00:29
     */

    require("../model/Usuario.php");

    class Usuario{
        
        public $user;
        public $password;
        public $nome;

        public static $instance;
    
        public static function getInstance() {
            if (!isset(self::$instance))
                self::$instance = new Usuario();
    
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
                
                return  Coon::lastInsertId();

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

    $user = $_POST['user_user'];
    $pass= $_POST['user_password'];
    $nome = $_POST['user_nome'];

    //salva no SQL:

    $noovo = new Usuario();

    $noovo->user = $user;
    $noovo->password= $pass;
    $noovo->nome = $nome;

    $id = $noovo->Inserir();
    
    //pega o id do usuario:


    //salvar foto!
    if ( isset( $_FILES[ 'user_img' ][ 'name' ] ) && $_FILES[ 'user_img' ][ 'error' ] == 0 )
    {
        echo 'Você enviou o arquivo: <strong>' . $_FILES[ 'user_img' ][ 'name' ] . '</strong><br />';
        echo 'Este arquivo é do tipo: <strong > ' . $_FILES[ 'user_img' ][ 'type' ] . ' </strong ><br />';
        echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ 'user_img' ][ 'tmp_name' ] . '</strong><br />';
        echo 'Seu tamanho é: <strong>' . $_FILES[ 'user_img' ][ 'size' ] . '</strong> Bytes<br /><br />';
        $arquivo_tmp = $_FILES[ 'user_img' ][ 'tmp_name' ];
        $nome = $_FILES[ 'user_img' ][ 'name' ];
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
        $destino = '../img/adm/' . $novoNome;
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