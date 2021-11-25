<?php
require_once 'Database.php';
  class Aluno{
    private $id;
    private $nome;
    private $dataNascimento;
    private $telefoneCelular;
    private $rg;
    private $cpf;
    private $idModulo;
    private $dataInicio;
    private $dataTermino;
    
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
  
    public function getCpf()
    {
      return $this->cpf;
    }
  
    public function setCpf($cpf)
    {
      $this->cpf = $cpf;
    }
    public function getIdModulo()
    {
      return $this->idModulo;
    }
  
    public function setIdModulo($idModulo)
    {
      $this->idModulo = $idModulo;
    }
    public function getDataInicio()
    {
      return $this->dataInicio;
    }
  
    public function setDataInicio($dataInicio)
    {
      $this->dataInicio = $dataInicio;
    }
    public function getDataTermino()
    {
      return $this->dataTermino;
    }
  
    public function setDataTermino($dataTermino)
    {
      $this->dataTermino = $dataTermino;
    }

    public function inserir()
    {
    
      $connection = $this->database->conectar();
      if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
      }
      $sql = "INSERT INTO alunos (nome, dataNascimento, telefoneCelular, rg, cpf, moduloId, dataInicioCurso, dataFinalCurso)
      VALUES ('".$this->nome."','".$this->dataNascimento."','".$this->telefoneCelular."','".$this->rg."','".$this->cpf."','".$this->idModulo."','".$this->dataInicio."','".$this->dataTermino."')";

      if ($connection->query($sql) === true) {
        $this->id = mysqli_insert_id($connection);
        $connection->close();
        return true;
      } else {
        $connection->close();
        return false;
      }
    }

    public function excluir($id)
    {
      
      $connection = $this->database->conectar();

      if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
      }

      $sql = "DELETE FROM alunos WHERE id = '".$id ."';";

      if ($connection->query($sql) === true) {
        $connection->close();
        return true;
      } else {
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
      $sql = "UPDATE `alunos` SET `nome` = '".$this->nome."', `dataNascimento` = '".$this->dataNascimento."', `telefoneCelular` = '".$this->telefoneCelular."', `rg` = '".$this->rg."', 
      `cpf` ='".$this->cpf."', `moduloId` ='".$this->idModulo."', `dataInicioCurso` = '".$this->dataInicio."', `dataFinalCurso` = '".$this->dataTermino."' WHERE `id` ='".$this->id."'" ;

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

      $sql = "SELECT * FROM alunos";
      $response = $connection->query($sql);
      $connection->close();
      return $response;
    }

    public function mostrar($id){
      $connection = $this->database->conectar();
      if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
      }
  
      $sql = "SELECT * FROM `alunos` WHERE `id` = ".$id;
      $response = $connection->query($sql);
      $data = $response->fetch_object();
  
      if($data != null)
      {
        $this->id = $data->id;
        $this->nome = $data->nome;
        $this->dataNascimento = $data->dataNascimento;
        $this->telefoneCelular = $data->telefoneCelular;
        $this->rg = $data->rg;
        $this->cpf = $data->cpf;
        $this->idModulo = $data->idModulo;
        $this->dataInicio = $data->dataInicio;
        $this->dataTermino = $data->dataTermino;
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