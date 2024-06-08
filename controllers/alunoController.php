<?php
include_once '../config/db.php';
include_once '../models/Aluno.php';

class AlunoController
{
    private $db;
    private $aluno;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->aluno = new Aluno($this->db);
    }

    public function create($data)
    {
        $this->aluno->nome = $data['nome'];
        $this->aluno->dataNascimento = $data['dataNascimento'];
        $this->aluno->cpf = $data['cpf'];
        $this->aluno->idTurma = $data['idTurma'];

        if ($this->aluno->create()) {
            echo "Aluno criado com sucesso.";
        } else {
            echo "Erro ao criar aluno.";
        }
    }

    public function read()
    {
        $stmt = $this->aluno->read();
        $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $alunos;
    }

    public function update($data)
    {
        $this->aluno->id = $data['id'];
        $this->aluno->nome = $data['nome'];
        $this->aluno->dataNascimento = $data['dataNascimento'];
        $this->aluno->cpf = $data['cpf'];
        $this->aluno->idTurma = $data['idTurma'];

        if ($this->aluno->update()) {
            echo "Aluno atualizado com sucesso.";
        } else {
            echo "Erro ao atualizar aluno.";
        }
    }

    public function delete($id)
    {
        $this->aluno->id = $id;

        if ($this->aluno->delete()) {
            echo "Aluno deletado com sucesso.";
        } else {
            echo "Erro ao deletar aluno.";
        }
    }
}
