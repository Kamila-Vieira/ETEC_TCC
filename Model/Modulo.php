<?php

require_once "Database.php";
require_once "Pessoa.php";

class Modulo  {

    private $id;
    private $professorId;
    private $modulo;

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

    public function adicionarModulo(){
        $modulo = [
            "id" => $this->__get("id"),
            "professorId" => $this->__get("id"),
            "modulo" => $this->__get("modulo"),
        ];

        $this->database->create('modulos', $modulo);
    }

    public function consultarModulos(){
        return $this->database->read('*', 'modulos');
    }

    public function modulosDoProfessor(){
        return $this->database->read('*', 'modulos', "WHERE professorId = ?", ["id" => $this->__get("professorId")]);
    }

    public function removerModulo(){
        $modulo = [
            "id" => $this->__get("id"),
            "modulo" => $this->__get("modulo"),
        ];

        $this->database->delete('modulos', 'id', ['id' => $this->__get("id")]);
    }
}