<?php


  if(!isset($_SESSION))
  {
    session_start();
  }

  require_once "../Model/Modulo.php";
  class ModuloController{
    public function __construct(){
      $this->modulo = new Modulo();
    }

    public function visualizarModuloPorId($id)
    {
      $result = $this->modulo->mostrar($id);
      return $result;
    }
    public function visualizarModuloPorNome($nome)
    {
      $result = $this->modulo->mostrarPorNome($nome);
      return $result;
    }
    public function listarModulosPorProfessor($professorId)
    {
      $result = $this->modulo->listarPorProfessor($professorId);
      return $result;
    }
    public function listarModulos()
    {
      $result = $this->modulo->listar();
      return $result;
    }
    public function atualizarModulo($id, $modulo, $professorId)
    {
      $this->modulo->setId($id);
      $this->modulo->setModulo($modulo);
      $this->modulo->setProfessorId($professorId);
      $result = $this->modulo->atualizar();
      return $result;
    }
    public function inserirModulo($id, $modulo, $professorId)
    {
      $this->modulo->setId($id);
      $this->modulo->setModulo($modulo);
      $this->modulo->setProfessorId($professorId);
      $result = $this->modulo->atualizar();
      return $result;
    }
  }
?>