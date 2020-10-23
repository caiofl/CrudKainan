<?php 

require_once '../../configuracao.php'; 
require_once $raiz . "/Entidades/Produto.php";

$deletar = new Produtos();

 if(isset($_POST['id']))
      {
        $id_produto = ($_POST['id']);
        $deletar->deletar($id_produto);
        //header("location: listagem-produtos.php");
    
      }
  ?>
