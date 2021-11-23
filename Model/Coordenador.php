<?php

require_once "Database.php";
require_once "Pessoa.php";

class Coordenador extends Pessoa {

    public function __construct(){
        $this->database = new Database();
    }

    public function login(){
        $login = ['login' => $this->__get("login"), 'senha' => md5($this->__get("senha"))];
        return $this->database->read('*', "coordenadores", "where login = ? AND senha = ?", $login);
    }
}