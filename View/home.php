<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/View/assets/styles/reset.css"/>
  <link rel="stylesheet" href="/View/assets/styles/styles.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
  <title>SGEA | Home</title>
</head>

<body class="principal">
  <main class="principal-main">
    <section class="principal-container container">
      <article class="principal-container-left">
        <h1 class="principal-container-title">SGEA</h1>
        <h2 class="principal-container-subtitle">Sistema degerenciamento de escola de arte</h2>
        <form action="/Controller/Navegacao.php" method="post" class="home-form">
          <button name="btnGoToLogin" class="home-btnLogin">
            <i class="fas fa-sign-in-alt"></i>Login
          </button>
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