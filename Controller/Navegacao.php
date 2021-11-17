<?php

  include_once 'View/home.php';
  
  if(!isset($_SESSION))
  {
    session_start(); 
  }

  if(isset($_POST["btnGoToLogin"])){
    include_once '../View/login.php';
  }

  if(isset($_POST["btnGoToCord"])){
    include_once '../View/loginCoordenador.php';
  }
  if(isset($_POST["btnLoginCoordenador"])){
    include_once '../View/areaCoordenador.php';
  }
  if(isset($_POST["btnLogin"])){
    include_once '../View/areaProfessor.php';
  }
  
  if(isset($_POST["btnLogout"])){
    include_once '../View/login.php';
  }
  if(isset($_POST["btnProfForm"])){
    include_once '../View/formularioProfessores.php';
  }
  if(isset($_POST["btnProfLista"])){
    include_once '../View/listagemProfessores.php';
  }
  if(isset($_POST["btnAlunosForm"])){
    include_once '../View/formularioAluno.php';
  }
  if(isset($_POST["btnAlunosLista"])){
    include_once '../View/listagemAlunos.php';
  }

?>