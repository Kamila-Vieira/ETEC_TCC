<?php

require_once "Database.php";
require_once "Pessoa.php";

class Professor extends Pessoa {

    public function adicionarProfessor(){
        $professor = [
            "id" => $this->__get("id"),
            "nome" => $this->__get("nome"),
            "dataNascimento" => $this->__get("dataNascimento"),
            "telefoneCelular" => $this->__get("telefoneCelular"),
            "rg" => $this->__get("rg"),
            "cpf" => $this->__get("cpf"),
            "login" => $this->__get("login"),
            "senha" => md5($this->__get("senha")),
        ];

        $this->database->create('professores', $professor);
    }

    public function consultarProfessores(){
        return $database->read('*', 'professores');
    }

    public function removerProfessor(){
        $this->database->delete('professores', 'id', ['id' => $this->__get("id")]);
    }

    public function login(){
        $login = ['login' => $this->__get("login"), 'senha' => md5($this->__get("senha"))];
        return $this->database->read('*', "professores", "where login = ? AND senha = ?", $login);
    }
}