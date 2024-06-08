<?php
include_once '../config/db.php';
include_once '../models/Aula.php';

class AulaController
{
    private $db;
    private $aula;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->aula = new Aula($this->db);
    }

    public function create($data)
    {
        $this->aula->materia = $data['materia'];
        $this->aula->idProfessor = $data['idProfessor'];
        $this->aula->idTurma = $data['idTurma'];
        $this->aula->dataAula = $data['dataAula'];

        if ($this->aula->create()) {
            echo "Aula criada com sucesso.";
        } else {
            echo "Erro ao criar aula.";
        }
    }

    public function read()
    {
        $stmt = $this->aula->read();
        $aulas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $aulas;
    }

    public function update($data)
    {
        $this->aula->id = $data['id'];
        $this->aula->materia = $data['materia'];
        $this->aula->idProfessor = $data['idProfessor'];
        $this->aula->idTurma = $data['idTurma'];
        $this->aula->dataAula = $data['dataAula'];

        if ($this->aula->update()) {
            echo "Aula atualizada com sucesso.";
        } else {
            echo "Erro ao atualizar aula.";
        }
    }

    public function delete($id)
    {
        $this->aula->id = $id;

        if ($this->aula->delete()) {
            echo "Aula deletada com sucesso.";
        } else {
            echo "Erro ao deletar aula.";
        }
    }
}
