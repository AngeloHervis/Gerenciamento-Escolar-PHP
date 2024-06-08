<?php
class Aula {
    private $conn;
    private $table_name = "aulas";

    public $id;
    public $materia;
    public $idProfessor;
    public $idTurma;
    public $dataAula;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (materia, idProfessor, idTurma, dataAula) VALUES (:materia, :idProfessor, :idTurma, :dataAula)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":materia", $this->materia);
        $stmt->bindParam(":idProfessor", $this->idProfessor);
        $stmt->bindParam(":idTurma", $this->idTurma);
        $stmt->bindParam(":dataAula", $this->dataAula);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET materia = :materia, idProfessor = :idProfessor, idTurma = :idTurma, dataAula = :dataAula WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":materia", $this->materia);
        $stmt->bindParam(":idProfessor", $this->idProfessor);
        $stmt->bindParam(":idTurma", $this->idTurma);
        $stmt->bindParam(":dataAula", $this->dataAula);
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>

//Crie a tabela necessaria para a classe Aula no MySql fazendo os relacionamentos necessarios com as outras tabelas.

CREATE TABLE aulas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    materia VARCHAR(100) NOT NULL,
    idProfessor INT NOT NULL,
    idTurma INT NOT NULL,
    dataAula DATE NOT NULL,
    FOREIGN KEY (idProfessor) REFERENCES professores(id),
    FOREIGN KEY (idTurma) REFERENCES turmas(id)
);
