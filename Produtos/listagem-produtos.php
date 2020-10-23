<?php 

include_once "../index.php";

include_once '../Entidades/Produto.php';

 ?>


<meta charset="UTF-8">
  <div class="container">
    <title>Formulário de usuarios </title>

<center><h1>Formulário dos Produtos</h1></center>

<table border="1" width="100%">
	<thead>
		<tr>
	   		  <th>Nome </th>	
       		<th>Quantidade </th>
   	   		<th>Preço de Compra </th>
       		<th>Preço de venda </th>
       		<th>Desciçoẽs </th>
       		<th>Opçoẽs </th>
   		</tr>
	</thead>

  <?php

    $exibir = new Produtos();

    foreach ($exibir->listar() as $novo):
  ?>

    <tr>
      <td><?php echo $novo['nome']; ?></td>
      <td><?php echo $novo['quantidade']; ?></td>
      <td><?php echo $novo['precocompra']; ?></td>
      <td><?php echo $novo['precovenda']; ?></td>
      <td><?php echo $novo['descricao']; ?></td>

      <td><a href="editar.php?id=<?php echo $novo['id']; ?>" class="btn btn-warning" role="button"> ✐Alterar</a>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger delete" data-toggle="modal" data-target="#exampleModal"> X Excluir</button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Excluir Usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"></span>
            </button>
          </div>
            <div class="modal-body">
              Deseja Realmente excluir ? 
            </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-secondary cancelar" data-dismiss="modal">Cancelar</button>
              <button value="<?php echo $novo['id']; ?>" type="button" name="deletar" class="btn btn-danger deletar"> SIM QUERO DELETAR </button>
          </div>
        </div>
      </div>
    </div>      

   <div id="mensagens"> </div>
    
  <?php
    endforeach;     

  ?>

      </tr>
  </tbody>
</table>


  <br>
      <a href="adicionar-produtos.php" class="btn btn-info" role="button">Adicionar Produto</a>
      

<script>
    
 $(document).ready(function(){   

$(".delete").click(function(){
  $(this).addClass('excluir');

  var id = $(this).closest("tr");

  $(".deletar").click(function(){
   
    $.ajax({
        type: "POST",
        url: "../Servidor/Produto/deletar.php",
        dataType  : 'json',
        data: { id: $(this).val() },
 
        success: function (data)
        {      
            id.remove();
            $('.cancelar').trigger('click'); 
        },
        error: function(data){
           $("#mensagens").html("Não foi possivel");
           location.reload();
        }

       });
     });
  });
});

</script>
     

      
 