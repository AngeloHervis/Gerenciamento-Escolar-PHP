<?php
include_once('Connect.php');

class Aluno
{
    private $id;
    private $nome;
    private $sobrenome;
    private $serie;
    private $dataNascimento;
    private $salaId;

    public function __construct($nome = null, $sobrenome = null, $serie = null, $dataNascimento = null, $salaId = null)
    {
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->serie = $serie;
        $this->dataNascimento = $dataNascimento;
        $this->salaId = $salaId;
    }

    public function cadastrarAluno()
    {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("INSERT INTO alunos (nome, sobrenome, serie, data_nascimento, sala_id) VALUES (:nome, :sobrenome, :serie, :dataNascimento, :salaId)");
            $sql->bindParam(':nome', $this->nome);
            $sql->bindParam(':sobrenome', $this->sobrenome);
            $sql->bindParam(':serie', $this->serie);
            $sql->bindParam(':dataNascimento', $this->dataNascimento);
            $sql->bindParam(':salaId', $this->salaId);
            $sql->execute();
        } catch (PDOException $erro) {
            echo "Cadastro falhou! " . $erro->getMessage();
        }
    }

    public function listarAluno()
    {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("
                SELECT alunos.id, alunos.nome, alunos.sobrenome, alunos.serie, alunos.data_nascimento, salas.numero_sala
                FROM alunos
                JOIN salas ON alunos.sala_id = salas.id
                ORDER BY alunos.nome
            ");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $erro) {
            echo "Erro ao listar alunos! " . $erro->getMessage();
            return [];
        }
    }

    public function excluirAluno($id)
    {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("DELETE FROM alunos WHERE id = :id");
            $sql->bindParam(':id', $id);
            $sql->execute();
        } catch (PDOException $erro) {
            echo "Erro ao excluir aluno! " . $erro->getMessage();
        }
    }

    public function editarAluno($id, $nome, $sobrenome, $serie, $dataNascimento, $salaId)
    {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("UPDATE alunos SET nome = :nome, sobrenome = :sobrenome, serie = :serie, data_nascimento = :dataNascimento, sala_id = :salaId WHERE id = :id");
            $sql->bindParam(':id', $id);
            $sql->bindParam(':nome', $nome);
            $sql->bindParam(':sobrenome', $sobrenome);
            $sql->bindParam(':serie', $serie);
            $sql->bindParam(':dataNascimento', $dataNascimento);
            $sql->bindParam(':salaId', $salaId);
            $sql->execute();
        } catch (PDOException $erro) {
            echo "Erro ao editar aluno! " . $erro->getMessage();
        }
    }

    public function buscarAlunoPorId($id)
    {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("SELECT * FROM alunos WHERE id = :id");
            $sql->bindParam(':id', $id);
            $sql->execute();
            return $sql->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $erro) {
            echo "Erro ao buscar aluno! " . $erro->getMessage();
            return null;
        }
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    public function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;
    }

    public function getSerie()
    {
        return $this->serie;
    }

    public function setSerie($serie)
    {
        $this->serie = $serie;
    }

    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }

    public function getSalaId()
    {
        return $this->salaId;
    }

    public function setSalaId($salaId)
    {
        $this->salaId = $salaId;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}
