<?php
include_once('../Model/Materia.php');

class MateriaController
{
    public function processar($acao)
    {
        if ($acao == "C") {
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $novaMateria = new Materia($nome, $descricao);
            $novaMateria->cadastrarMateria();
            echo "Matéria cadastrada com sucesso!";
        } elseif ($acao == "R") {
            $materia = new Materia();
            $resultado = $materia->listarMaterias();
            include_once('../View/Listar.php');
        } elseif ($acao == "U") {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $materia = new Materia();
            $materia->editarMateria($id, $nome, $descricao);
            echo "Matéria editada com sucesso!";
        } elseif ($acao == "D") {
            $id = $_POST['id'];
            $materia = new Materia();
            $materia->excluirMateria($id);
            echo "Matéria excluída com sucesso!";
        }
    }

    public function processarDelete($id)
    {
        $materia = new Materia();
        $materia->excluirMateria($id);
        header("Location: ../Controller/MateriaController.php?action=R");
        exit();
    }

    public function processarUpdate($id)
    {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $materia = new Materia();
        $materia->setNome($nome);
        $materia->setDescricao($descricao);
        $materia->editarMateria($id, $nome, $descricao);
        echo "Matéria atualizada com sucesso!";
    }

    public function processarEdit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];

            $materia = new Materia();
            $materia->setId($id);
            $materia->setNome($nome);
            $materia->setDescricao($descricao);
            $materia->editarMateria($id, $nome, $descricao);

            header("Location: ../Controller/MateriaController.php?action=R");
            exit();
        } else {
            $materia = new Materia();
            $materiaAtual = $materia->getMateriaById($id);
            include_once('../View/Editar.php');
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $acao = $_GET['action'];
    $controller = new MateriaController();
    $controller->processar($acao);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $controller = new MateriaController();
        $controller->processarDelete($id);
    } elseif (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $controller = new MateriaController();
        $controller->processarEdit($id);
    } else {
        $acao = $_GET['action'];
        $controller = new MateriaController();
        $controller->processar($acao);
    }
}
