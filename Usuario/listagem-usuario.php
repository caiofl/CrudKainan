<?php

include_once '../index.php';

include_once '../Entidades/Usuario.php';

?>

<meta charset="UTF-8">
<div class="container">
<title>Formulário de usuarios </title>

<center><h1>Formulário de Usuários</h1></center>
  

  <h4>Digite o nome a pesquisar</h4>
      <div id="consulta" class="input-prepend">
        <input type="text"  name="pesquisa" id="pesquisa" tabindex="1" placeholder="Pesquisar Usuario.."/>
      </div><br/>


<div id="resultado">
<table border="1" id="id_tabela" class="table table-striped table table-condensed">
	<thead>
		<tr bgcolor="black" style="color:White;">
	   	   	<th> Nome </th>	
       		<th> Email </th>
   	   		<th> CPF </th>
       		<th> Nacimento </th>
       		<th> Opções </th>
   		</tr>
	</thead>

  <tbody>
	<?php
	
		$exibir = new Usuario;
		foreach ($exibir->listar() as $novo):
	?>

		<tr>
      <td><?php echo $novo['nome']; ?></td>
			<td><?php echo $novo['email']; ?></td>
			<td><?php echo $novo['cpf']; ?></td>
			<td><?php echo $novo['nascimento']; ?></td>
			<td><a href="editar.php?id=<?php echo $novo['id']; ?>" class="btn btn-warning" role="button"> ✐Alterar</a>


  <!-- Button trigger modal -->
  <button type="button" class="btn btn-danger delete" value="<?php echo $novo['id']; ?>" data-toggle="modal" data-target="#exampleModal"> X Excluir</button> 


	<?php	
		endforeach;
  ?>
	

  <!--MOdaal-->
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Excluir Usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
           Deseja Realmente excluir ? 
          </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-secondary cancelar" data-dismiss="modal">Cancelar</button>
              <button value="" type="button" name="deletar" class="btn btn-danger deletar"> SIM QUERO DELETAR </button>
              </td>
            </tr>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 

		</tr>
  </tbody>
</table>

<br>
<a href="adicionar-usuario.php" class="btn btn-info" role="button">Adicionar Usuario</a>

<script>
    
$(document).ready(function(){   

$(".delete").click(function(){
  $(this).addClass('excluir');
  $('.deletar').val($(this).val());

  var id = $(this).closest("tr");

  $(".deletar").click(function(){
   
    $.ajax({
        type: "POST",
        url: "../Servidor/Usuario/deletar.php",
        dataType  : 'json',
        data: { id: $(this).val() },
 
        success: function(data){      
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

 $("#pesquisa").keyup(function(){

     var busca = $(this);

    $.ajax({
      type: "POST",
      url: "../Servidor/Usuario/listagem.php",
      data: { busca: $(this).val()},

      success: function(data){

          $("#resultado").empty().html(data);

         }     

      });

   });

});


</script>



