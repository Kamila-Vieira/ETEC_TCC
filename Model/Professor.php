<?php
require_once 'Database.php';
class Professor
{
  private $id;
  private $nome;
  private $telefoneCelular;
  private $rg;
  private $cpf;
  private $login;
  private $senha;
  private $dataNascimento;
  
  public function __construct(){
    $this->database = new Database();
  }

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getNome()
  {
    return $this->nome;
  }

  public function setNome($nome)
  {
    $this->nome = $nome;
  }

  public function getTelefoneCelular()
  {
    return $this->telefoneCelular;
  }

  public function setTelefoneCelular($telefoneCelular)
  {
    $this->telefoneCelular = $telefoneCelular;
  }

  public function getRg()
  {
    return $this->rg;
  }

  public function setRg($rg)
  {
    $this->rg = $rg;
  }
 
  public function getDataNascimento()
  {
    return $this->dataNascimento;
  }

  public function setDataNascimento($dataNascimento)
  {
    $this->dataNascimento = $dataNascimento;
  }

  public function getSenha()
  {
    return $this->senha;
  }

  public function setSenha($senha)
  {
    $this->senha = $senha;
  }

  public function getCpf()
  {
    return $this->cpf;
  }

  public function setCpf($cpf)
  {
    $this->cpf = $cpf;
  }
  public function getLogin()
  {
    return $this->login;
  }

  public function setLogin($login)
  {
    $this->login = $login;
  }

  public function inserir()
  {
    $connection = $this->database->conectar();

    if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
    }

    $sql = "INSERT INTO professores (nome, telefoneCelular, rg, cpf, login, senha, dataNascimento)
    VALUES ('".$this->nome."', '".$this->telefoneCelular."', '".$this->rg."','".$this->cpf."', '".$this->login."','".$this->senha."','".$this->dataNascimento."')";

    if ($connection->query($sql) === true) {
      $this->id = mysqli_insert_id($connection);
      $connection->close();
      return true;
    } else {
      $connection->close();
      return false;
    }
  }

  public function carregar($login)
  {
    $connection = $this->database->conectar();
    if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
    }
    $sql = "SELECT * FROM `professores` WHERE `login` = '".$login."'";
    
    $response = $connection->query($sql);
    $data = $response->fetch_object();
    
    if($data != null)
    {
      $this->senha = $data->senha;
      $connection->close();
      return $data;
    }
    else
    {
      $connection->close();
      return false;
    }
  }

  public function atualizar()
  {
    $connection = $this->database->conectar();
    if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
    }

    $sql = "UPDATE `professores` SET `nome` = '".$this->nome."', `telefoneCelular` = '".$this->telefoneCelular."', `rg` = '".$this->rg."', `cpf` = '".$this->cpf."', 
    `login`='".$this->login."', `senha`='".$this->senha."', `dataNascimento` = '".$this->dataNascimento."' WHERE `id` ='".$this->id."'" ;
      
    if ($connection->query($sql) === true) {
      $connection->close();
      return true;
    } else {
      $connection->close();
      return false;
    }
  }
  
  public function listar()
  {
    $connection = $this->database->conectar();
    if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
    }
    $sql = "SELECT * FROM professores;" ;
    $response = $connection->query($sql);
    $connection->close();
    return $response;
  }

  public function mostrar($id){
    $connection = $this->database->conectar();
    if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
    }

    $sql = "SELECT * FROM `professores` WHERE `id` = ".$id;
    $response = $connection->query($sql);
    $data = $response->fetch_object();

    if($data != null)
    {
      $this->id = $data->id;
      $this->nome = $data->nome;
      $this->telefoneCelular = $data->telefoneCelular;
      $this->rg = $data->rg;
      $this->cpf = $data->cpf;
      $this->login = $data->login;
      $this->senha = $data->senha;
      $this->dataNascimento = $data->dataNascimento;
      $connection->close();
      return $data;
    }
    else
    {
      $connection->close();
      return false;
    }
  }
}


?>



