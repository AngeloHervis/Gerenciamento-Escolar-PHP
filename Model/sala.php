<?php
include_once('Connect.php');

class Sala
{
    private $id;
    private $numero_sala;
    private $capacidade;
    private $localizacao;

    public function __construct($numero_sala = null, $capacidade = null, $localizacao = null)
    {
        $this->numero_sala = $numero_sala;
        $this->capacidade = $capacidade;
        $this->localizacao = $localizacao;
    }

    public function cadastrarSala()
    {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("INSERT INTO salas (numero_sala, capacidade, localizacao) VALUES (:numero_sala, :capacidade, :localizacao)");
            $sql->bindParam(':numero_sala', $this->numero_sala);
            $sql->bindParam(':capacidade', $this->capacidade);
            $sql->bindParam(':localizacao', $this->localizacao);
            $sql->execute();
        } catch (PDOException $erro) {
            echo "Cadastro de sala falhou! " . $erro->getMessage();
        }
    }

    public function listarSala()
    {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("SELECT id, numero_sala, capacidade, localizacao FROM salas");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $erro) {
            echo "Erro ao listar salas! " . $erro->getMessage();
            return [];
        }
    }

    public function excluirSala($id)
    {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("DELETE FROM salas WHERE id = :id");
            $sql->bindParam(':id', $id);
            $sql->execute();
        } catch (PDOException $erro) {
            echo "Erro ao excluir sala! " . $erro->getMessage();
        }
    }

    public function editarSala($id, $numero_sala, $capacidade, $localizacao)
    {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("UPDATE salas SET numero_sala = :numero_sala, capacidade = :capacidade, localizacao = :localizacao WHERE id = :id");
            $sql->bindParam(':id', $id);
            $sql->bindParam(':numero_sala', $numero_sala);
            $sql->bindParam(':capacidade', $capacidade);
            $sql->bindParam(':localizacao', $localizacao);
            $sql->execute();
        } catch (PDOException $erro) {
            echo "Erro ao editar sala! " . $erro->getMessage();
        }
    }

    public function buscarSalaPorId($id)
    {
        try {
            $conn = Conexao::conectar();
            $sql = $conn->prepare("SELECT id, numero_sala, capacidade, localizacao FROM salas WHERE id = :id");
            $sql->bindParam(':id', $id);
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $erro) {
            echo "Erro ao buscar sala! " . $erro->getMessage();
            return [];
        }
    }

    public function getNumeroSala()
    {
        return $this->numero_sala;
    }

    public function setNumeroSala($numero_sala)
    {
        $this->numero_sala = $numero_sala;
    }

    public function getLocalizacao()
    {
        return $this->localizacao;
    }

    public function setLocalizacao($localizacao)
    {
        $this->localizacao = $localizacao;
    }

    public function getCapacidade()
    {
        return $this->capacidade;
    }

    public function setCapacidade($capacidade)
    {
        $this->capacidade = $capacidade;
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
