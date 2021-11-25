<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once "../Model/Aluno.php";
class AlunoController
{
  public function __construct()
  {
    $this->aluno = new Aluno();
  }

  public function listarAlunos()
  {
    $alunos = $this->aluno->listar();
    return $alunos;
  }
  public function visualizarAluno($id)
  {
    $result = $this->aluno->mostrar($id);
    return $result;
  }
  public function atualizarAluno($id, $nome, $telefoneCelular, $rg, $cpf, $moduloid ,$dataInicio, $dataTermino, $dataNascimento)
  {
    $this->aluno->setId($id);
    $this->aluno->setNome($nome);
    $this->aluno->setTelefoneCelular($telefoneCelular);
    $this->aluno->setRg($rg);
    $this->aluno->setIdModulo($moduloid);
    $this->aluno->setCpf($cpf);
    $this->aluno->setDataInicio($dataInicio);
    $this->aluno->setDataTermino($dataTermino);
    $this->aluno->setDataNascimento($dataNascimento);
    $result = $this->aluno->atualizar();
    return $result;
  }

  public function inserirAluno($id, $nome, $telefoneCelular, $rg, $cpf, $moduloid ,$dataInicio, $dataTermino, $dataNascimento)
  {
    $this->aluno->setId($id);
    $this->aluno->setNome($nome);
    $this->aluno->setTelefoneCelular($telefoneCelular);
    $this->aluno->setRg($rg);
    $this->aluno->setIdModulo($moduloid);
    $this->aluno->setCpf($cpf);
    $this->aluno->setDataInicio($dataInicio);
    $this->aluno->setDataTermino($dataTermino);
    $this->aluno->setDataNascimento($dataNascimento);
    $result = $this->aluno->inserir();
    return $result;
  }
}
