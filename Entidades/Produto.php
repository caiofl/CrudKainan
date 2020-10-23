<?php 

require_once '/var/www/html/CrudKainan/Database/conexao.php';


class Produtos {

	private $id, $nome, $quantidade, $precocompra, $precovenda, $descricao;


	public function getID(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getQuantidade(){
		return $this->quantidade;
	}

	public function setQuantidade($quantidade){
		$this->quantidade = $quantidade;
	}

	public function getPrecocompra(){
		return $this->precocompra;
	}

	public function setPrecocompra($precocompra){
		$this->precocompra = $precocompra;
	}

	public function getPrecovenda(){
		return $this->precovenda;
	}

	public function setPrecovenda($precovenda){
		$this->precovenda = $precovenda;
	}

	public function getDescricao(){
		return $this->descricao;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}


	public function create ($nome, $quantidade, $precocompra, $precovenda, $descricao) {

	try{

		$sql = ("INSERT INTO produtos (nome, quantidade, precocompra, precovenda, descricao) VALUES (?, ?, ?, ?, ?)");

		$cadastrar = Conexao::getConnect()->prepare($sql);

		$cadastrar->bindParam(1, $nome);
		$cadastrar->bindParam(2, $quantidade);
		$cadastrar->bindParam(3, $precocompra);
		$cadastrar->bindParam(4, $precovenda);
		$cadastrar->bindParam(5, $descricao);

    	if ($cadastrar->execute()) {
      		if ($cadastrar->rowCount() > 0) {
        		echo " Produto cadastrados com Sucesso!";
      		} else {
        		echo "Erro ao tentar cadastrar";
      				}
    	} else {
        		throw new PDOException("Error não foi possivel executar sql");
      		}
    	} catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
      }
    } 

 	 public function listar(){

      $pdo = Conexao::getConnect();

      $produto = $pdo->query("SELECT * FROM produtos")->fetchAll();
    
      if(!empty($produto)){
          return $produto;
      }
          return [];
    }

  	public function editar($nome, $quantidade, $precocompra, $precovenda, $descricao, $id) {

      $sql = "UPDATE produtos SET nome = '$nome', quantidade = '$quantidade', precocompra = '$precocompra', precovenda = '$precovenda', descricao = '$descricao' WHERE id = '$id'";
      $editar = Conexao::getConnect()->prepare($sql);  

      $editar->bindValue(1, $nome); //bindParam recebe variaveis ou parametros
      $editar->bindValue(2, $quantidade);
      $editar->bindValue(3, $precocompra);
      $editar->bindValue(4, $precovenda);
      $editar->bindValue(5, $descricao);
      $editar->bindValue(6, $id);

      $editar->execute();

    }


    public function mostrar($id) {

      $pdo = Conexao::getConnect();

      $dados = $pdo->query("SELECT * FROM produtos WHERE id = $id")->fetch();
    
   		if(!empty($dados)){
        	return $dados;
    }
    	    return [];
	}


	public function deletar($id){

		$sql = "DELETE FROM produtos WHERE id = ?"; 

		$deletar = Conexao::getConnect()->prepare($sql);
		$deletar->bindValue(1, $id);
		$deletar->execute();

	}

}




 ?>