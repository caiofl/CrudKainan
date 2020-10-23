<?php
 
require_once '../incluir/estilo.php';

require_once '../Entidades/Usuario.php';

$usuario = new Usuario();
$novo = $usuario->mostrar($_GET['id']);

?>

<div class="row">
  <div class="col s10 m6 push-m3">
    <h3 class="ligth"> Editar Usuário </h3>
     <form action="" method="POST">
      <input type="hidden" name="id" id="id" value="<?php if(isset($novo['id'])) { echo $novo['id']; }?>">

       <div class="input-field col s10">
          <input type="text" name="nome" id="nome" required value="<?php if(isset($novo['nome'])) { echo $novo['nome']; } ?>">
          <label for="nome"></label>
       </div>


       <div class="input-field col s10">
          <input type="email" name="email" id="email" maxlength="60" required value="<?php if(isset($novo['email'])) { echo $novo['email']; } ?>">
          <label for="email"></label>
       </div>

       <div class="input-field col s10">
          <input type="text" name="cpf" id="cpf" maxlength="14" required value="<?php if(isset($novo['cpf'])) { echo $novo['cpf']; } ?>">
          <label for="cpf"></label>
       </div>


       <div class="input-field col s10">
          <input type="date" name="nascimento" id="nascimento" required value="<?php if(isset($novo['nascimento'])) { echo $novo['nascimento']; } ?>">
          <label for="nascimento"></label> <!-- label efeito ao clicar no campo -->
       </div>

       <a href="listagem-usuario.php" class="btn green"> Lista de clientes </a>
       <button type="button" id="btn-editar"  name="btn-editar" class="btn"> Atualizar </button>

       <div id="mensagens"></div>
      
    </form>
  </div> 
</div>



<script>
    
  $(document).ready(function(){   

  $("#btn-editar").click(function(){
   $.ajax({

      url: '../Servidor/Usuario/editar.php',
      type: 'POST',
      data:{
        id:$("#id").val(),
        nome:$("#nome").val(),
        email:$("#email").val(),
        cpf:$("#cpf").val(),
        nascimento:$("#nascimento").val()
      },

      beforeSend: function(){

        $("#mensagens").html("");
      },
      success: function(data)
      {

         alert('Atualizado com Sucesso')

         $("#mensagens").html(data);
      },
      error:function(data)
      {
        $("#mensagens").html("Não foi possivel Editar!");
         
      }


    });
  });
});

</script>


