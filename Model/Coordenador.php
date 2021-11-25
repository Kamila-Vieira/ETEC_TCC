<?php
class Coordenador{
  private $id;
  private $nome;
  private $telefoneCelular;
  private $rg;
  private $cpf;
  private $login;
  private $senha;
  private $dataNascimento;

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  public function getNome()
  {
    return $this->nome;
  }

  public function setNome($nome)
  {
    $this->nome = $nome;

    return $this;
  }

  public function getTelefoneCelular()
  {
    return $this->telefoneCelular;
  }

  public function setTelefoneCelular($telefoneCelular)
  {
    $this->telefoneCelular = $telefoneCelular;

    return $this;
  }

  public function getRg()
  {
    return $this->rg;
  }

  public function setRg($rg)
  {
    $this->rg = $rg;

    return $this;
  }
 
  public function getDataNascimento()
  {
    return $this->dataNascimento;
  }

  public function setDataNascimento($dataNascimento)
  {
    $this->dataNascimento = $dataNascimento;

    return $this;
  }

  public function getSenha()
  {
    return $this->senha;
  }

  public function setSenha($senha)
  {
    $this->senha = $senha;

    return $this;
  }

  public function getCpf()
  {
    return $this->cpf;
  }

  public function setCpf($cpf)
  {
    $this->cpf = $cpf;

    return $this;
  }
  public function getLogin()
  {
    return $this->login;
  }

  public function setLogin($login)
  {
    $this->login = $login;

    return $this;
  }

  public function carregarCoordenador($login){
    require_once 'Database.php';
    $database = new Database();

    $connection = $database->conectar();
    if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
    }
    $sql = 'SELECT `senha` FROM `coordenadores` WHERE `login` = '.$login ;
    $response = $connection->query($sql);
    $data = $response->fetch_object();
    if($data!= null)
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
      return true;
    }
    else
    {
      $connection->close();
      return false;
    }
  }
}


?>