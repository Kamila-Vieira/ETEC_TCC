<?php
  if(!isset($_SESSION))
  {
    session_start(); 
  }

  include_once 'View/home.php';
  

  if(isset($_POST["btnGoToLogin"])){
    include_once '../View/login.php';
  }

  if(isset($_POST["btnGoToCord"])){
    include_once '../View/loginCoordenador.php';
  }
  if(isset($_POST["btnVoltarHome"])){
    include_once '../View/home.php';
  }
  if(isset($_POST["btnVoltarAreaCoordenador"])){
    include_once '../View/areaCoordenador.php';
  }
  if(isset($_POST["btnLoginCoordenador"])){
    require_once '../Controller/CoordernadorController.php';
    $coordenadorController = new CoordenadorController();

    if($coordenadorController->login($_POST['loginCR'], $_POST['senhaCR']))
    {
      include_once '../View/areaCoordenador.php';
    }
    else
    {
      include_once '../View/acessoNaoAutorizado.php';
    }
  }

  if(isset($_POST["btnLogin"])){
    require_once '../Controller/ProfessorController.php';
    $professorController = new ProfessorController();
    $login = $professorController->login($_POST['login'], $_POST['senha']);
    if($login)
    {
      include_once '../View/areaProfessor.php';
    }
    else
    {
      include_once '../View/acessoNaoAutorizado.php';
    }
  }
  
  if(isset($_POST["btnLogout"])){
    if(isset($_SESSION))
    {
      session_destroy(); 
      include_once '../View/home.php';
    }
  }

  //Menu Navegação
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

  if(isset($_POST["btnAddNovoProf"])){
    require_once '../Controller/ProfessorController.php';
    $professorController = new ProfessorController();
    $insert = $professorController->inserirProfessor($_POST['id'], $_POST['nome'], $_POST['celular'], $_POST['rg'], $_POST['modulo'], $_POST['moduloId'], $_POST['cpf'], $_POST['login'], $_POST['senha'], $_POST['datadenascimento']);

    if($insert)
    {
      include_once '../View/cadastroRealizado.php';
    }else{
      include_once '../View/cadastroNaoRealizado.php';
    }
  }

  if(isset($_POST["btnAddNovoAluno"])){
    require_once '../Controller/AlunoController.php';

    $alunoController = new AlunoController();
    $insert = $alunoController->inserirAluno($_POST['id'], $_POST['nome'], $_POST['celular'], $_POST['rg'], $_POST['cpf'], $_POST['moduloId'], $_POST['datadeinicio'], $_POST['datadetermino'],$_POST['datadenascimento']);
    
    if($insert)
    {
      include_once '../View/cadastroRealizado.php';
    }else{
      include_once '../View/cadastroNaoRealizado.php';
    }
  }

  if(isset($_POST["btnVisualizarAluno"])){
    require_once '../Controller/AlunoController.php';

    $alunoController = new AlunoController();
    if($alunoController->visualizarAluno($_POST['id']))
    {
      include_once '../View/perfilAluno.php';
    }
    
  }
  if(isset($_POST["btnVisualizarProfessor"])){
    require_once '../Controller/ProfessorController.php';

    $professorController = new ProfessorController();
    if($professorController->visualizarProfessor($_POST['id']))
    {
      include_once '../View/perfilProfessor.php';
    }
    
  }

  if(isset($_POST["btnAtualizarProf"])){
    require_once '../Controller/ProfessorController.php';

    $professorController = new ProfessorController();
    $update = $professorController->atualizarProfessor($_POST['id'], $_POST['nome'], $_POST['celular'], $_POST['rg'], $_POST['cpf'], $_POST['login'], $_POST['senha'], $_POST['datadenascimento'], $_POST['moduloId'], $_POST['modulo']);

    if($update)
    {
      include_once '../View/cadastroRealizado.php';
    }else{
      include_once '../View/cadastroNaoRealizado.php';
    }
  }

  if(isset($_POST["btnAtualizarAluno"])){
    require_once '../Controller/AlunoController.php';
    $alunoController = new AlunoController();
    $update = $alunoController->atualizarAluno($_POST['id'], $_POST['nome'], $_POST['celular'], $_POST['rg'], $_POST['cpf'], $_POST['moduloId'], $_POST['datadeinicio'], $_POST['datadetermino'],$_POST['datadenascimento']);
    
    if($update)
    {
      include_once '../View/cadastroRealizado.php';
    }else{
      include_once '../View/cadastroNaoRealizado.php';
    }
  }


?>