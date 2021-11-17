<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/View/assets/styles/reset.css">
  <link rel="stylesheet" href="/View/assets/styles/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
  <title>SGEA | Área do coordenador</title>
</head>

<body class="area-coordenador main-area">
  <header class="header">
    <section class="header-container">
      <form form action="/Controller/Navegacao.php" method="post" class="header-top">
        <p class="header-top-title">SGEA</p>
        <button name="btnLogout" class="header-top-logout">
          <i class="fas fa-sign-in-alt"></i>Logout
        </button>
      </form>
      <h1 class="header-title-content">Seja bem vindo(a), <br/> coordenador(a)</h1>
    </section>
  </header>

  <main class="main-area-content">
    <section class="main-area-container">
      <article class="main-area-menu">
        <form action="/Controller/Navegacao.php" method="post" class="main-area-form">
          <nav class="main-area-menu-nav">
            <ul class="main-area-menu-list">
              <li class="main-area-menu-item"><button name="btnProfForm">Cadastro de professores</button></li>
              <li class="main-area-menu-item"><button name="btnProfLista">Listagem de professores</button></li>
              <li class="main-area-menu-item"><button name="btnAlunosForm">Cadastro de alunos</button></li>
              <li class="main-area-menu-item"><button name="btnCordAlunosLista">Listagem de Alunos</button></li>
            </ul>
          </nav>
        </form>
      </article>
      <article class="main-area-image">
        <figure class="main-area-image-banner">
          <img class="main-area-image-content" src="/View/assets/img/main-area-banner.png" alt="Quadro e tintas" />
        </figure>
      </article>
    </section>
  </main>

  <footer class="footer">
    <section class="footer-container">
      <p class="footer-container-text">© 2021 - Sistema de gerenciamento de escola de arte</p>
    </section>
  </footer>
</body>

</html>