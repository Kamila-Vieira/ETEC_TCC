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

?>