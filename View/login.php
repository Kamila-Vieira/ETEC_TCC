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
  <title>SGEA | Login</title>
</head>

<body class="login">
  <main class="principal-main">
    <section class="principal-container container">
      <article class="principal-container-left">
        <h1 class="principal-container-title">SGEA</h1>

        <form action="/Controller/Navegacao.php" method="post" class="login-form">
          <div class="login-form-email">
            <input type="text" name="login" placeholder="Ex.: teste@teste.com"/>
            <label>Login</label>
          </div>
          <div class="login-form-password">
            <input type="password" name="senha" />
            <label>Senha</label>
          </div>
          <div class="login-form-buttons">
            <button name="btnLogin" class="login-btnLogin">
              Entrar
            </button>
            <button name="btnGoToCord" class="login-btnCoordenador">
              Login como coordenador
            </button>
          </div>
        </form>

      </article>
      <article class="principal-container-right">
        <figure class="principal-container-banner">
          <img class="principal-container-banner-image" src="/View/assets/img/banner-pencils-home.svg" alt="Pincéis" />
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