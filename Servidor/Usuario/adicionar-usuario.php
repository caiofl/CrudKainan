<?php

require_once '../../configuracao.php'; 
require_once $raiz . "/Entidades/Usuario.php";

$novo = new Usuario();

$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$nascimento = $_POST['nascimento'];

$novo->create($nome, $email, $cpf, $nascimento);

?>