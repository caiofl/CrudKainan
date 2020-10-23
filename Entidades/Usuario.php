<?php 

require_once '/var/www/html/CrudKainan/Database/conexao.php';

class Usuario {

  private $id, $nome, $email, $cpf, $nascimento;

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getNome() {
    return $this->nome;
  }

  public function setNome($nome) {
    $this->nome = $nome;
  }


  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = $email;
  }
  
  public function getCpf() {
    return $this->cpf;
  }

  public function setCpf($cpf) {
    $this->cpf = $cpf;
  }
  
  public function getNascimento() {
    return $this->nascimento;
  }

  public function setNascimento($nascimento) {
    $this->nascimento = $nascimento;
  }



public function create($nome, $email, $cpf, $nascimento) {


  try {

    $sql = ("INSERT INTO usuarios (nome, email, cpf, nascimento) VALUES (?, ?, ?, ?)");

    $cadastrar = Conexao::getConnect()->prepare($sql);

    $cadastrar->bindParam(1, $nome); //bindParam recebe variaveis ou parametros
    $cadastrar->bindParam(2, $email);
    $cadastrar->bindParam(3, $cpf);
    $cadastrar->bindParam(4, $nascimento);

    if ($cadastrar->execute()) {
      if ($cadastrar->rowCount() > 0) {
        echo " Dados cadastrados com Sucesso!";
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
  

    public function listar($busca = ''){

      $pdo = Conexao::getConnect();

      $usuarios = $pdo->query("SELECT * FROM usuarios WHERE nome LIKE '?' OR email LIKE '?' OR cpf LIKE '?' OR nascimento LIKE '?'")->fetchAll();
    
      if(!empty($usuarios)){
          return $usuarios;
      }
          return [];
    }


    public function editar($nome, $email, $cpf, $nascimento, $id) {

      $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', cpf = '$cpf', nascimento = '$nascimento' WHERE id = '$id'";
      

      $editar = Conexao::getConnect()->prepare($sql);  

      $editar->bindValue(1, $nome); //bindParam recebe variaveis ou parametros
      $editar->bindValue(2, $email);
      $editar->bindValue(3, $cpf);
      $editar->bindValue(4, $nascimento);
      $editar->bindValue(5, $id);

      if ($editar->execute()) {
        if ($editar->rowCount() > 0) {
            echo " Dados Aterado com Sucesso!";
        }else {
            echo "Nenhum dado para alterar";
        }
        }else {
            throw new PDOException("Error não foi possivel executar sql");
        }
      } 
     
    

    public function mostrar($id) {

      $pdo = Conexao::getConnect();

      $dados = $pdo->query("SELECT * FROM usuarios WHERE id = '$id'")->fetch();
    
    if(!empty($dados)){
        return $dados;
    }
        return [];


    }

    public function deletar($id) {

      $sql = 'DELETE FROM usuarios WHERE id = ?';
      
      $deletar = Conexao::getConnect()->prepare($sql);
      $deletar->bindValue(1, $id);
      $deletar->execute();
    }

} 


 ?>


 

    