<?php
 
require_once '../../configuracao.php'; 
require_once $raiz . "/Entidades/Usuario.php";

$editar = new Usuario();

$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$nascimento = $_POST['nascimento'];
$id = $_POST['id'];

$editar->editar($nome, $email, $cpf, $nascimento, $id);
//header('Location: listagem-usuario.php');
//die();


?>