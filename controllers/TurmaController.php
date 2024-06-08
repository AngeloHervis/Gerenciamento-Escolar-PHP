<?php
include_once '../config/db.php';
include_once '../models/Turma.php';

class TurmaController
{
    private $db;
    private $turma;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->turma = new Turma($this->db);
    }

    public function create($data)
    {
        $this->turma->nome = $data['nome'];

        if ($this->turma->create()) {
            echo "Turma criada com sucesso.";
        } else {
            echo "Erro ao criar turma.";
        }
    }

    public function read()
    {
        $stmt = $this->turma->read();
        $turmas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $turmas;
    }

    public function update($data)
    {
        $this->turma->id = $data['id'];
        $this->turma->nome = $data['nome'];

        if ($this->turma->update()) {
            echo "Turma atualizada com sucesso.";
        } else {
            echo "Erro ao atualizar turma.";
        }
    }

    public function delete($id)
    {
        $this->turma->id = $id;

        if ($this->turma->delete()) {
            echo "Turma deletada com sucesso.";
        } else {
            echo "Erro ao deletar turma.";
        }
    }
}
