<?php
include_once('../Model/Professor.php');

class ProfessorController
{
    public function processar($acao)
    {
        if ($acao == "C") {
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $graduacao = $_POST['graduacao'];
            $data_nascimento = $_POST['data_nascimento'];
            $materia_id = $_POST['materia_id'];
            $novoProfessor = new Professor($nome, $sobrenome, $graduacao, $data_nascimento, $materia_id);
            $novoProfessor->cadastrarProfessor();
            echo "Professor cadastrado com sucesso!";
        } elseif ($acao == "R") {
            $professor = new Professor();
            $resultado = $professor->listarProfessor();
            include_once('../View/ListarProfessor.php');
        } elseif ($acao == "U") {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $graduacao = $_POST['graduacao'];
            $data_nascimento = $_POST['data_nascimento'];
            $materia_id = $_POST['materia_id'];
            $professor = new Professor();
            $professor->atualizarProfessor($id, $nome, $sobrenome, $graduacao, $data_nascimento, $materia_id);
            echo "Professor editado com sucesso!";
        } elseif ($acao == "D") {
            $id = $_POST['id'];
            $professor = new Professor();
            $professor->excluirProfessor($id);
            echo "Professor excluído com sucesso!";
        }
    }

    public function processarDelete($id)
    {
        $professor = new Professor();
        $professor->excluirProfessor($id);
        header("Location: ../Controller/ProfessorController.php?action=R");
        exit();
    }

    public function processarUpdate($id)
    {
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $graduacao = $_POST['graduacao'];
        $data_nascimento = $_POST['data_nascimento'];
        $materia_id = $_POST['materia_id'];
        $professor = new Professor();
        $professor->atualizarProfessor($id, $nome, $sobrenome, $graduacao, $data_nascimento, $materia_id);
        echo "Professor atualizado com sucesso!";
    }

    public function processarEdit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $graduacao = $_POST['graduacao'];
            $data_nascimento = $_POST['data_nascimento'];
            $materia_id = $_POST['materia_id'];

            $professor = new Professor();
            $professor->setId($id);
            $professor->setNome($nome);
            $professor->setSobrenome($sobrenome);
            $professor->setGraduacao($graduacao);
            $professor->setDataNascimento($data_nascimento);
            $professor->setMateriaId($materia_id);
            $professor->atualizarProfessor($id, $nome, $sobrenome, $graduacao, $data_nascimento, $materia_id);

            header("Location: ../Controller/ProfessorController.php?action=R");
            exit();
        } else {
            $professor = new Professor();
            $professorAtual = $professor->buscarProfessorPorId($id);
            include_once('../View/EditarProfessor.php');
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $acao = $_GET['action'];
    $controller = new ProfessorController();
    $controller->processar($acao);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $controller = new ProfessorController();
        $controller->processarDelete($id);
    } elseif (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $controller = new ProfessorController();
        $controller->processarEdit($id);
    } else {
        $acao = $_GET['action'];
        $controller = new ProfessorController();
        $controller->processar($acao);
    }
}