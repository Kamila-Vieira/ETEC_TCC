<?php

class Pessoa {
    
    protected  $id;
    protected  $nome;
    protected  $telefoneCelular;
    protected  $rg;
    protected  $cpf;
    protected  $login;
    protected  $senha;    
    protected  $dataNascimento;    

    public function __construct(){
        $this->id = uniqid();
        $this->database = new Database();
    }

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }
}