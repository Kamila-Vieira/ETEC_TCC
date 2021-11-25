<?php

  if(!isset($_SESSION))
  {
    session_start();
  }
  require_once '../Model/Professor.php';
  class ProfessorController{
    public function __construct(){
      $this->professor = new Professor();
    }

    // public function login($login, $senha)
    // {
      
    //   $this->professor->carregarProfessor($login);
    //   if($this->professor->getSenha() == $senha)
    //   {
    //     $_SESSION['Professor'] = serialize($this->professor);
    //     return true;
    //   }
    //   else
    //   {
    //     return false;
    //   }
    // }

    public function listarProfessores()
    {
      $professores = $this->professor->listar();
      return $professores;
    }

    public function visualizarProfessor($id)
    {
      $result = $this->professor->mostrar($id);
      return $result;
    }

    public function atualizarProfessor($id, $nome, $telefoneCelular, $rg, $cpf, $login, $senha, $dataNascimento)
    {
      $this->professor->setId($id);
      $this->professor->setNome($nome);
      $this->professor->setTelefoneCelular($telefoneCelular);
      $this->professor->setRg($rg);
      $this->professor->setCpf($cpf);
      $this->professor->setLogin($login);
      $this->professor->setSenha($senha);
      $this->professor->setDataNascimento($dataNascimento);
      $result = $this->professor->atualizar();
      return $result;
    }

    public function inserirProfessor($id, $nome, $telefoneCelular, $rg, $modulo, $moduloid, $cpf, $login, $senha, $dataNascimento)
    {
      $this->professor->setId($id);
      $this->professor->setNome($nome);
      $this->professor->setTelefoneCelular($telefoneCelular);
      $this->professor->setRg($rg);
      $this->professor->setCpf($cpf);
      $this->professor->setLogin($login);
      $this->professor->setSenha($senha);
      $this->professor->setDataNascimento($dataNascimento);
      $result = $this->professor->inserir();
      include_once '../Controller/ModuloController.php';
      $modulo = new ModuloController();
      $modulo->inserirModulo($moduloid, $modulo, $id);
      return $result;
    }

  }

?>