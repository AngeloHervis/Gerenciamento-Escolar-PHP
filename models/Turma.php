<?php
class Turma
{
    private $conn;
    private $table_name = "turmas";

    public $id;
    public $nome;
    public $idProfessor;
    public $idAula;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . " (nome, idProfessor, idAluno, idAula) VALUES (:nome, :idProfessor, :idAluno, :idAula)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":idProfessor", $this->idProfessor);
        $stmt->bindParam(":idAula", $this->idAula);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function read()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function update()
    {
        $query = "UPDATE " . $this->table_name . " SET nome = :nome, idProfessor = :idProfessor, idAluno = :idAluno, idAula = :idAula WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":idProfessor", $this->idProfessor);
        $stmt->bindParam(":idAula", $this->idAula);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete()
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
