<?php
  require_once 'Database.php';
  class Modulo
  {
    private $id;
    private $professorId;
    private $modulo;

    //ID
    public function setID($id)
    {
    $this->id = $id;
    }
    public function getID()
    {
    return $this->id;
    }
    //idusuario
    public function setProfessorId($professorId)
    {
    $this->professorId = $professorId;
    }
    public function ProfessorId()
    {
    return $this->professorId;
    }
    //inicio
    public function setModulo($modulo)
    {
    $this->modulo = $modulo;
    }
    public function getModulo()
    {
    return $this->modulo;
    }

    public function __construct(){
      $this->database = new Database();
    }

    public function inserir()
    {
      $connection = $this->database->conectar();
      if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
      }

      $sql = "INSERT INTO modulos (professorId, modulo)
      VALUES ('".$this->professorId."','".$this->modulo."')";

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

      $sql = "DELETE FROM modulos WHERE id = '".$id ."';";

      if ($connection->query($sql) === true) {
        $connection->close();
        return true;
      } else {
        $connection->close();
        return false;
      }
    }

    public function listarPorProfessor($professorId)
    {
      $connection = $this->database->conectar();

      if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
      }

      $sql = "SELECT * FROM modulos WHERE professorId = '".$professorId."'" ;
      $response = $connection->query($sql);
      $connection->close();
      return $response;
    }

    public function mostrar($id)
    {
      $connection = $this->database->conectar();

      if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
      }
      $sql = "SELECT * FROM modulos WHERE id = '".$id."'" ;

      $response = $connection->query($sql);
      $data = $response->fetch_object();
  
      if($data != null)
      {
        $this->id = $data->id;
        $this->modulo = $data->modulo;
        $this->professorId = $data->professorId;
        $connection->close();
        return $data;
      }
      else
      {
        $connection->close();
        return false;
      }
    }
    public function mostrarPorNome($nome)
    {
      $connection = $this->database->conectar();

      if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
      }

      $sql = "SELECT * FROM `modulos` WHERE `modulo` = '".$nome."'" ;

      $response = $connection->query($sql);
      $data = $response->fetch_object();
      
      if($data != null)
      {
        $this->id = $data->id;
        $this->modulo = $data->modulo;
        $this->professorId = $data->professorId;
        $connection->close();
        return $data;
      }
      else
      {
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

      $sql = "SELECT * FROM modulos" ;
      $response = $connection->query($sql);
      $connection->close();
      return $response;
    }

  }

?>