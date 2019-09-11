<?php
    /**
     * Created by PhpStorm.
     * User: Lua Azul
     * Date: 11/09/2019
     * Time: 00:29
     */

    $marca = $_POST['contact_marca'];
    $modelo= $_POST['contact_modelo'];
    $valor= $_POST['contact_valor'];

    //salva no SQL:

    //pega o id do usuario:

    $id="0";

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
            $destino = '../img/car/' . $novoNome;
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