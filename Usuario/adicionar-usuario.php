<?php
  
require_once '../incluir/estilo.php';

require_once '../Entidades/Usuario.php';

?>

<div class="row">
  <div class="col s12 m6 push-m3">
      <h3 class="ligth"> Novo Usuário </h3>
     <form id="" action="" method="POST">
       <div class="input-field col s12">
          <input   type="text" name="nome" id="nome" placeholder="Nome" required>
       </div>


       <div class="input-field col s12" id="resultado">
          <input type="email" name="email" id="email" maxlength="60" placeholder="Digite seu email" required>
       </div>

       <div class="input-field col s12">
          <input type="text" name="cpf" id="cpf" maxlength="14" placeholder="CPF" required>
       </div>


       <div class="input-field col s12">
          <input type="date" name="nascimento" id="nascimento" required>
          <label for="nascimento">Nascimento</label> <!-- label efeito ao clicar no campo -->
       </div>

       <!-- Redirecionar para pag do form create.php-->
       <button type="button"  name="btn-cadastrar"  id="btn-cadastrar" class="btn"> Cadastrar </button> 
       <a href="listagem-usuario.php" class="btn green"> Lista de clientes </a>
       
       
      <div id="mensagens" class="mensagens col-md-12 text center text-muted mt-3">

      </div>

     </form>

  </div>
</div> 



 <script>
  
  $(document).ready(function(){

    $( "#btn-cadastrar" ).click(function() {
      $.ajax({

        url: '../Servidor/Usuario/adicionar-usuario.php', 
        type:'POST',
        data:{
          nome:$("#nome").val(),
          email:$("#email").val(),
          cpf:$("#cpf").val(),
          nascimento:$("#nascimento").val()
        },

        beforeSend: function(){ 

          $("#mensagens").html("Carregando..");
        },
        success:function(data)
        { 
          $("#mensagens").html(data); 
        },
        error:function(data){
          $("mensagens").html("Erro a o encontrar a pagina.");
          alert('Erro ao cadastrar');
          location.reload();
            
        }        
    });
  });
});

</script>
