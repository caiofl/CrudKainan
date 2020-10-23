<?php

require_once '../../configuracao.php'; 
require_once $raiz . "/Entidades/Produto.php";

$editar = new Produtos();

$nome = $_POST['nome'];
$quantidade = $_POST['quantidade'];
$precocompra = $_POST['precocompra'];
$precovenda = $_POST['precovenda'];
$descricao = $_POST['descricao'];
$id = $_POST['id'];

$editar->editar($nome, $quantidade, $precocompra, $precovenda, $descricao, $id);

?>
