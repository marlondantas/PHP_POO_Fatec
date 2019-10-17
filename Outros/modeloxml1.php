<?php
echo "<h1>Criando arquivo XML...</h1>";
$meus_links = array();

$meus_links[0]['id'] = '1';
$meus_links[0]['titulo'] = 'Teste 1';
$meus_links[0]['descricao'] = 'Desc 1';
$meus_links[0]['imagem'] = 'Image 1';

$meus_links[1]['id'] = '2';
$meus_links[1]['titulo'] = 'Teste 2';
$meus_links[1]['descricao'] = 'Desc 2';
$meus_links[1]['imagem'] = 'Image 2';

$meus_links[2]['id'] = '3';
$meus_links[2]['titulo'] = 'Teste 3';
$meus_links[2]['descricao'] = 'Desc 3';
$meus_links[2]['imagem'] = 'Image 3';

// Receberá todos os dados do XML
$xml = '<?xml version="1.0" encoding="ISO-8859-1"?>';

// A raiz do meu documento XML
$xml .= '<links>';

for ( $i = 0; $i < count( $meus_links ); $i++ ) {
	$xml .= '<link>';
	$xml .= '<id>' . $meus_links[$i]['id'] . '</id>';
	$xml .= '<titulo>' . $meus_links[$i]['titulo'] . '</titulo>';
	$xml .= '<descricao>' . $meus_links[$i]['descricao'] . '</descricao>';
	$xml .= '<imagem>' . $meus_links[$i]['imagem'] . '</imagem>';
	$xml .= '</link>';
}

$xml .= '</links>';

// Escreve o arquivo
$fp = fopen('dados.xml', 'w+');
fwrite($fp, $xml);
fclose($fp);
?>
