<?php 

 require_once '../incluir/estilo.php';

 require_once '../Entidades/Produto.php';

 $produto = new Produtos();
 $novo = $produto->mostrar($_GET['id']);

?>


<div class="row">
  <div class="col s10 m6 push-m3">
    <h3 class="ligth"> Editar Produto </h3>
    <form action="" method="POST">
       <input type="hidden" name="id" id="id" value="<?php if(isset($novo['id'])) { echo $novo['id']; }?>">


       <div class="input-field col s10">
          Nome:
          <input type="text" name="nome" id="nome" required value="<?php if(isset($novo['nome'])) { echo $novo['nome']; } ?>">
          <label for="nome"></label>
       </div>


       <div class="input-field col s10">
          Quantidade:
          <input type="text" name="quantidade" id="quantidade" required value="<?php if(isset($novo['quantidade'])) { echo $novo['quantidade']; } ?>">
          <label for="quantidade"></label>
       </div>

       <div class="input-field col s10">
          Preço Compra (R$):
          <input type="text" name="precocompra" id="precocompra" required value="<?php if(isset($novo['precocompra'])) { echo $novo['precocompra']; } ?>">
          <label for="precocompra"></label> <!-- label efeito ao clicar no campo -->
       </div>

       <div class="input-field col s10">
          Preço Venda (R$):
          <input type="text" name="precovenda" id="precovenda" required value="<?php if(isset($novo['precovenda'])) { echo $novo['precovenda']; } ?>">
          <label for="precovenda"></label> <!-- label efeito ao clicar no campo -->
       </div>

       <div class="input-field col s10">
          Descrição
          <input type="text" name="descricao" id="descricao" required value="<?php if(isset($novo['descricao'])) { echo $novo['descricao']; } ?>">
          <label for="descricao"></label> <!-- label efeito ao clicar no campo -->
       </div>

       <button type="button" id="btn-editar" name="btn-editar" class="btn"> Atualizar </button> 
       <a href="listagem-produtos.php" class="btn green"> Lista de clientes </a>

       <div id="mensagens"> </div>
    </form>

  </div> 
</div>


<script>
    
  $(document).ready(function(){   

  $("#btn-editar").click(function(){
   $.ajax({

      url: '../Servidor/Produto/editar.php',
      type: 'POST',
      data:{
        id:$("#id").val(),
        nome:$("#nome").val(),
        quantidade:$("#quantidade").val(),
        precocompra:$("#precocompra").val(),
        precovenda:$("#precovenda").val(),
        descricao:$("#descricao").val()
      },

      beforeSend: function(){

        $("#mensagens").html("");
      },
      success: function(data)
      {
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
