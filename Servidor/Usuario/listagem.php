<?php

require_once '../../configuracao.php'; 
require_once $raiz . "/Entidades/Usuario.php";

	$exibir = new Usuario;
	foreach ($exibir->listar($_POST['busca']) as $novo):

	$html =
	"<tr>
      	<td> {$novo['nome']} </td>
		<td> {$novo['email']} </td>
		<td> {$novo['cpf']} </td>
		<td> {$novo['nascimento']} </td>
		<td><a href='editar.php?id={$novo['id']}' class='btn btn-warning' role='button'> ✐Alterar</a>

		<button type='button' class='btn btn-danger delete' value='{$novo['id']}' data-toggle='modal' data-target='#exampleModal'> X Excluir</button> 
		</td>
	</tr>";

	endforeach;


?>
	
