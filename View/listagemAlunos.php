<?php
  if (!isset($_SESSION)) {
    session_start();
  }
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/View/assets/styles/reset.css">
  <link rel="stylesheet" href="/View/assets/styles/styles.css">


  <title>SGEA | Lista de alunos</title>
</head>

<body class="listagem-alunos common-body">
  <header class="common-header list-header">
    <form action="/Controller/Navegacao.php" method="post" class="common-header-container">
      <button name="btnVoltarAreaCoordenador" class="common-header-container-back">
        <svg width="49" height="11" viewBox="0 0 49 11" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg">
          <path d="M2 5.65772L48 5.65771" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
          <path d="M6.00098 10.2392L0.999977 5.65777L6.00098 1.07629" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </button>
      <p class="common-header-container-title">SGEA</p>
      <button name="btnLogout" class="common-header-container-logout">
        <svg width="26" height="21" viewBox="0 0 26 21" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M4.875 20.2475H9.14062C9.47578 20.2475 9.75 19.9721 9.75 19.6354V17.5948C9.75 17.2581 9.47578 16.9826 9.14062 16.9826H4.875C3.97617 16.9826 3.25 16.2531 3.25 15.3501V5.55526C3.25 4.6523 3.97617 3.92279 4.875 3.92279H9.14062C9.47578 3.92279 9.75 3.64731 9.75 3.31061V1.27002C9.75 0.933317 9.47578 0.657837 9.14062 0.657837H4.875C2.18359 0.657837 0 2.85148 0 5.55526V15.3501C0 18.0539 2.18359 20.2475 4.875 20.2475ZM7.26172 9.99356L15.793 1.42306C16.5547 0.657837 17.875 1.19349 17.875 2.29031V7.18774H24.7812C25.4566 7.18774 26 7.7336 26 8.4121V13.3095C26 13.988 25.4566 14.5339 24.7812 14.5339H17.875V19.4313C17.875 20.5281 16.5547 21.0638 15.793 20.2986L7.26172 11.7281C6.78945 11.2485 6.78945 10.4731 7.26172 9.99356Z" fill="black" />
        </svg>
        Logout
      </button>
    </form>
    <section class="common-header-title">
      <div class="common-header-title-container">
        <h1 class="common-header-title-main">Lista de Alunos</h1>
      </div>
    </section>
  </header>

  <main class="list-main aluno-list common-main">
    <section class="list-main-content">
      
        <?php
          include_once '../Controller/AlunoController.php';
          if(!isset($_SESSION))
          {
            session_start();
          }
          $aluno = new AlunoController();
          $results = $aluno->listarAlunos();
          if($results != null)

          while($row = $results->fetch_object()){
            echo '<form action="/Controller/Navegacao.php" method="post" class="list-main-content-form">';
            echo '<button class="list-main-content-item" name="btnVisualizarAluno">';
            echo '<input type="hidden" name="id" value="'.$row->id.'">';
            echo '<div class="list-main-content-image"><img src="/View/assets/img/avatar-default.png" alt="Avatar" class="list-main-content-image-content"></div>';
            echo '<div class="list-main-content-name"><p class="list-main-content-name-text">'.$row->nome.'</p></div>';
            echo '</button></form>';
          }
        ?>
    </section>
  </main>

  <footer class="footer">
    <section class="footer-container">
      <p class="footer-container-text">?? 2021 - Sistema de gerenciamento de escola de arte</p>
    </section>
  </footer>

</body>

</html>