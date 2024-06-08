<?php
class Aluno
{
    private $conn;
    private $table_name = "alunos";

    public $id;
    public $nome;
    public $dataNascimento;
    public $cpf;
    public $idTurma;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        $query = "INSERT INTO " . $this->table_name . " (nome, dataNascimento, cpf, idTurma) VALUES (:nome, :dataNascimento, :cpf, :idTurma)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":dataNascimento", $this->dataNascimento);
        $stmt->bindParam(":cpf", $this->cpf);
        $stmt->bindParam(":idTurma", $this->idTurma);

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
        $query = "UPDATE " . $this->table_name . " SET nome = :nome, dataNascimento = :dataNascimento, cpf = :cpf, idTurma = :idTurma WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":dataNascimento", $this->dataNascimento);
        $stmt->bindParam(":cpf", $this->cpf);
        $stmt->bindParam(":idTurma", $this->idTurma);
        $stmt->bindParam(":id", $this->id);

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
