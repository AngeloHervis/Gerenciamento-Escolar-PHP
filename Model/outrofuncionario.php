<?php
include_once('Connect.php');

class OutroFuncionario
{
    private $id;
    private $nome;
    private $cargo;
    private $data_nascimento;

    public function __construct($nome = null, $cargo = null, $data_nascimento = null)
    {
        $this->nome = $nome;
        $this->cargo = $cargo;
        $this->data_nascimento = $data_nascimento;
    }

    public function cadastrarOutroFuncionario()
    {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("INSERT INTO outros_funcionarios (nome, cargo, data_nascimento) VALUES (:nome, :cargo, :data_nascimento)");
            $sql->bindParam(':nome', $this->nome);
            $sql->bindParam(':cargo', $this->cargo);
            $sql->bindParam(':data_nascimento', $this->data_nascimento);
            $sql->execute();
        } catch (PDOException $erro) {
            echo "Cadastro falhou! " . $erro->getMessage();
        }
    }

    public function listarOutroFuncionario()
    {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("SELECT id, nome, cargo, data_nascimento FROM outros_funcionarios");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $erro) {
            echo "Erro ao listar funcionários! " . $erro->getMessage();
            return [];
        }
    }

    public function excluirOutroFuncionario($id)
    {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("DELETE FROM outros_funcionarios WHERE id = :id");
            $sql->bindParam(':id', $id);
            $sql->execute();
        } catch (PDOException $erro) {
            echo "Erro ao excluir funcionário! " . $erro->getMessage();
        }
    }

    public function editarOutroFuncionario($id, $nome, $cargo, $data_nascimento)
    {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("UPDATE outros_funcionarios SET nome = :nome, cargo = :cargo, data_nascimento = :data_nascimento WHERE id = :id");
            $sql->bindParam(':id', $id);
            $sql->bindParam(':nome', $nome);
            $sql->bindParam(':cargo', $cargo);
            $sql->bindParam(':data_nascimento', $data_nascimento);
            $sql->execute();
        } catch (PDOException $erro) {
            echo "Erro ao editar funcionário! " . $erro->getMessage();
        }
    }

    public function buscarOutroFuncionarioPorId($id)
    {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("SELECT id, nome, cargo, data_nascimento FROM outros_funcionarios WHERE id = :id");
            $sql->bindParam(':id', $id);
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $erro) {
            echo "Erro ao buscar funcionário! " . $erro->getMessage();
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

    public function getCargo()
    {
        return $this->cargo;
    }

    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }

    public function getDataNascimento()
    {
        return $this->data_nascimento;
    }

    public function setDataNascimento($data_nascimento)
    {
        $this->data_nascimento = $data_nascimento;
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
