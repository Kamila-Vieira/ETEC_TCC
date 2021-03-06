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

  <title>SGEA | Cadastro de aluno</title>
</head>

<body class="formulario-aluno common-body">
  <header class="common-header form-header">
    <form action="/Controller/Navegacao.php" method="post"class="common-header-container">
      <button name="btnVoltarAreaCoordenador" class="common-header-container-back">
        <svg width="49" height="11" viewBox="0 0 49 11" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg">
          <path d="M2 5.65772L48 5.65771" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M6.00098 10.2392L0.999977 5.65777L6.00098 1.07629" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </button>
      <p class="common-header-container-title">SGEA</p>
      <button name="btnLogout" class="common-header-container-logout">
        <svg width="26" height="21" viewBox="0 0 26 21" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M4.875 20.2475H9.14062C9.47578 20.2475 9.75 19.9721 9.75 19.6354V17.5948C9.75 17.2581 9.47578 16.9826 9.14062 16.9826H4.875C3.97617 16.9826 3.25 16.2531 3.25 15.3501V5.55526C3.25 4.6523 3.97617 3.92279 4.875 3.92279H9.14062C9.47578 3.92279 9.75 3.64731 9.75 3.31061V1.27002C9.75 0.933317 9.47578 0.657837 9.14062 0.657837H4.875C2.18359 0.657837 0 2.85148 0 5.55526V15.3501C0 18.0539 2.18359 20.2475 4.875 20.2475ZM7.26172 9.99356L15.793 1.42306C16.5547 0.657837 17.875 1.19349 17.875 2.29031V7.18774H24.7812C25.4566 7.18774 26 7.7336 26 8.4121V13.3095C26 13.988 25.4566 14.5339 24.7812 14.5339H17.875V19.4313C17.875 20.5281 16.5547 21.0638 15.793 20.2986L7.26172 11.7281C6.78945 11.2485 6.78945 10.4731 7.26172 9.99356Z" fill="black"/>
        </svg>
        Logout
      </button>
    </form>
    <section class="common-header-title">
      <div class="common-header-title-container">
        <h1 class="common-header-title-main">Formul??rio de <br/> cadastro</h1>
        <h2 class="common-header-title-secondary">Fa??a aqui um novo cadastro <br/> de aluno</h2>
      </div>
    </section>
  </header>

  <main class="form-main aluno-form common-main">
    <section class="form-main-container">
      <form method="post" target="formulario" class="form-main-content">
        <div class="form-main-personal-data form-piece">
          <h3 class="form-title">Dados pessoais</h3>
          <div class="form-line">
            <label class="form-line-item name">Nome completo<input type="text" name="nome"/></label>
            
          </div>
          <div class="form-line">
           
            <label class="form-line-item celular">Telefone celular<input type="text" name="celular" placeholder="(99) 99999-9999"/></label>
            <label class="form-line-item data-nascimento">Data de Nascimento<input type="date" placeholder="DD/MM/AAAA" name="datadenascimento"/></label>
          </div>
          <div class="form-line">
            <label class="form-line-item rg">RG<input type="text" name="rg"/></label>
            <label class="form-line-item cpf">CPF<input type="text" name="cpf" placeholder="000.000.000-00"/></label>
          </div>
        </div>
        <div class="form-main-school-data form-piece">
          <h3 class="form-title">Dados acad??micos</h3>
          <div class="form-line">
            <div class="form-line-combo modulo">
              <label class="form-line-item modulo">
                M??dulo
                <input type="text" readonly="readonly" value="" placeholder="Selecione o m??dulo" name="modulo"/>
                <input type="hidden" id="moduloId" name="moduloId" value=""/>
                <span class="form-line-item-list-arrow">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 9.89832L12 13.8577L16 9.89832" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </span>
              </label>
                <ul class="form-line-item-list">
                  <?php 
                    include_once '../Controller/ModuloController.php';
                    $modulo = new ModuloController();
                    $results = $modulo->listarModulos();
                    if($results != null)
                    while($row = $results->fetch_object()){
                      printf('<li data-id="'.$row->id.'" data-value="'.$row->modulo.'" >'.$row->modulo.'</li>');
                    }
                  ?>
                </ul>
              </div>
          </div>
          <div class="form-line">
            <label class="form-line-item data-inicio">Data de in??cio do curso<input type="date" placeholder="DD/MM/AAAA" name="datadeinicio"/></label>
            <label class="form-line-item data-termino">Data de t??rmino do curso<input type="date" placeholder="DD/MM/AAAA" name="datadetermino"/></label>
          </div>
        </div>
        <div class="form-main-submit form-piece">
          <div class="form-main-submit-message">
            <svg width="26" height="28" viewBox="0 0 26 28" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M13 14V8" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M13 19.3333L13 19.3333" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M1 17.1747V10.8253C1 8.68932 2.136 6.71465 3.98133 5.63998L9.98133 2.14798C11.8467 1.06265 14.152 1.06265 16.0173 2.14798L22.0173 5.63998C23.864 6.71465 25 8.68932 25 10.8253V17.1747C25 19.3107 23.864 21.2853 22.0187 22.36L16.0187 25.852C14.1533 26.9373 11.848 26.9373 9.98267 25.852L3.98267 22.36C2.136 21.2853 1 19.3107 1 17.1747V17.1747Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p class="form-main-submit-message-text"> 
              Importante! <br />
              Preencha todos os dados
            </p>
          </div>
          <button class="form-main-submit-button" name="btnAddNovoAluno">Salvar cadastro</button>
          <div class="message-errors-container"></div>
        </div>
      </form>
    </section>
  </main>
  <iframe style="display:none;" name="formulario" src="formulario.php"></iframe>
  <footer class="footer">
    <section class="footer-container">
      <p class="footer-container-text">?? 2021 - Sistema de gerenciamento de escola de arte</p>
    </section>
  </footer>

  <script src="/View/assets/scripts/jquery-1.9.0.min.js" type="text/javascript"></script>
  <script src="/View/assets/scripts/jquery.maskedinput.min.js" type="text/javascript"></script>  
  <script src="/View/assets/scripts/main.js"></script>
</body>

</html>