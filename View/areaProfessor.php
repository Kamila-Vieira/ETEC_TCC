<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/View/assets/styles/reset.css">
<link rel="stylesheet" href="/View/assets/styles/styles.css">
  <title>SGEA | Área do professor</title>
</head>

<body class="area-professor main-area">
  <header class="header">
    <section class="header-container">
      <form form action="/Controller/Navegacao.php" method="post" class="header-top">
        <p class="header-top-title">SGEA</p>
        <button name="btnLogout" class="header-top-logout">
          <span class="header-top-logout-icon"></span>
          Logout
        </button>
      </form>
      <h1 class="header-title-content">Seja bem vindo(a), <br/> professor(a)</h1>
    </section>
  </header>

  <main class="main-area-container">
    <section class="main-area-menu">
      <form action="/Controller/Navegacao.php" method="post" class="main-area-form">
        <nav class="main-area-menu-nav">
          <ul class="main-area-menu-list">
            <li class="main-area-menu-item"><button name="btnProfAlunosLista">Listagem de Alunos</button></li>
          </ul>
        </nav>
      </form>
    </section>
    <section class="main-area-image">
      <figure class="main-area-image-banner">
        <img class="main-area-image-content" src="/View/assets/img/main-area-banner.png" alt="Quadro e tintas" />
      </figure>
    </section>
  </main>

  <footer class="footer">
    <section class="footer-container">
      <p class="footer-container-text">© 2021 - Sistema de gerenciamento de escola de arte</p>
    </section>
  </footer>
</body>

</html>