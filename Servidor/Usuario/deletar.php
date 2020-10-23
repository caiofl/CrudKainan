<?php 

require_once '../../configuracao.php'; 
require_once $raiz . "/Entidades/Usuario.php";

$deletar = new Usuario();

if(isset($_POST['id']))
	{
		$id = ($_POST['id']);
		$deletar->deletar($id);
		
	}

?>