<?php
include_once '../config/db.php';
include_once '../models/Professor.php';

class ProfessorController
{
    private $db;
    private $professor;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->professor = new Professor($this->db);
    }

    public function create($data)
    {
        $this->professor->nome = $data['nome'];
        $this->professor->cpf = $data['cpf'];
        $this->professor->materia = $data['materia'];

        if ($this->professor->create()) {
            echo "Professor criado com sucesso.";
        } else {
            echo "Erro ao criar professor.";
        }
    }

    public function read()
    {
        $stmt = $this->professor->read();
        $professores = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $professores;
    }

    public function update($data)
    {
        $this->professor->id = $data['id'];
        $this->professor->nome = $data['nome'];
        $this->professor->cpf = $data['cpf'];
        $this->professor->materia = $data['materia'];
        $this->professor->idTurma = $data['idTurma'];

        if ($this->professor->update()) {
            echo "Professor atualizado com sucesso.";
        } else {
            echo "Erro ao atualizar professor.";
        }
    }

    public function delete($id)
    {
        $this->professor->id = $id;

        if ($this->professor->delete()) {
            echo "Professor deletado com sucesso.";
        } else {
            echo "Erro ao deletar professor.";
        }
    }
}