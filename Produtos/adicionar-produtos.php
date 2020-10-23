<?php
  
require_once '../incluir/estilo.php';

require_once '../Entidades/Produto.php';

?>

<div class="row">
  <div class="col s10 m6 push-m3">
      <h3 class="ligth"> Novo Produto </h3>
     <form id="" action="" method="POST">

       <div class="input-field col s10">
          Nome:
          <input type="text" name="nome" id="nome" required>
          <label for="nome"></label>
       </div>


       <div class="input-field col s10">
          Quantidade:
          <input type="text" name="quantidade" id="quantidade" required>
          <label for="quantidade"></label>
       </div>

       <div class="input-field col s10">
          Preço Compra (R$):
          <input type="text" name="precocompra" id="precocompra" required>
          <label for="precocompra"></label> <!-- label efeito ao clicar no campo -->
       </div>

       <div class="input-field col s10">
          Preço Venda (R$):
          <input type="text" name="precovenda" id="precovenda" required>
          <label for="precovenda"></label> <!-- label efeito ao clicar no campo -->
       </div>

       <div class="input-field col s10">
          Descrição
          <input type="text" name="descricao" id="descricao" required>
          <label for="descricao"></label> <!-- label efeito ao clicar no campo -->
       </div>

       <!-- Redirecionar para pag do form create.php-->
       <button type="button" name="btn-cadastrar" id="btn-cadastrar" class="btn"> Cadastrar </button> 
       <a href="listagem-produtos.php" class="btn green"> Lista de clientes </a>

       <div id="mensagens"> </div>

     </form>
  </div>
</div>

 <script>
  
  $(document).ready(function(){

    $( "#btn-cadastrar" ).click(function() {
      $.ajax({

        url: '../Servidor/Produto/adicionar-produtos.php', 
        type:'POST',
        data:{
          nome:$("#nome").val(),
          quantidade:$("#quantidade").val(),
          precocompra:$("#precocompra").val(),
          precovenda:$("#precovenda").val(),
          descricao:$("#descricao").val()
        },

        beforeSend: function(){ 

          $("#mensagens").html("Carregando..");
        },
        success:function(data)
        {
          $("#mensagens").html(data);
        },
        error:function(data){
          $("mensagens").html("Não conseguimos encontrar a Pagina");
            location.reload();
            
        }


    });
  });
});

</script>




