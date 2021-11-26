<?php
  if(!isset($_SESSION))
  {
    session_start();
  }

  require_once '../Model/Coordenador.php';
  class CoordenadorController{
    public function __construct(){
      $this->coordenador = new Coordenador();
    }

    public function login($login, $senha)
    {
      $this->coordenador->carregar($login);
      if($this->coordenador->getSenha() == $senha)
      { 
        $_SESSION['Coordenador'] = serialize($this->coordenador);
        return true;
      }
      else
      {
        return false;
      }
    }

  }
  
?>