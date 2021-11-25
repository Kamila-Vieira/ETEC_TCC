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
  <link rel="stylesheet" href="/View/assets/styles/reset.css"/>
  <link rel="stylesheet" href="/View/assets/styles/styles.css"/>
  <title>SGEA | Acesso não autorizado</title>
</head>

<body>
  <main class="menssage-container">
    <form action="/Controller/Navegacao.php" method="post" class="menssage-content">
      <p>Você não tem acesso ao sistema</p>
      <button name="btnVoltarHome">OK</button>
    </form>
  </main>
  <footer class="footer">
    <section class="footer-container">
      <p class="footer-container-text">© 2021 - Sistema de gerenciamento de escola de arte</p>
    </section>
  </footer>

</body>

</html>