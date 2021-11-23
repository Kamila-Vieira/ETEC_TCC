<?php

require_once "Database.php";
require_once "Pessoa.php";

class Aluno extends Pessoa {

    private $moduloId;
    private $dataInicioCurso;
    private $dataFinalCurso;

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    public function adicionarAluno(){
        $aluno = [
            "id" => $this->__get("id"),
            "nome" => $this->__get("nome"),
            "dataNascimento" => $this->__get("dataNascimento"),
            "telefoneCelular" => $this->__get("telefoneCelular"),
            "rg" => $this->__get("rg"),
            "cpf" => $this->__get("cpf"),
            "moduloId" => $this->__get("moduloId"),
            "dataInicioCurso" => $this->__get("dataInicioCurso"),
            "dataFinalCurso" => $this->__get("dataFinalCurso"),
        ];

        $this->database->create('alunos', $aluno);
    }

    public function consultarAlunos(){
        return $this->database->read('*', 'alunos');
    }

    public function consultarAlunosModulo(){
        return $this->database->read('*', 'alunos', 'WHERE moduloId = ?', ["moduloId" => $this->__get("moduloId")]);
    }

    public function removerAluno(){
        $this->database->delete('alunos', 'id', ['id' => $this->__get("id")]);
    }
}