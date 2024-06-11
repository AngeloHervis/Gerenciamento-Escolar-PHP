<?php
include_once('../Model/Aluno.php');

class AlunoController
{
    public function processar($acao)
    {
        switch ($acao) {
            case "C":
                $nome = $_POST['nome'] ?? '';
                $sobrenome = $_POST['sobrenome'] ?? '';
                $serie = $_POST['serie'] ?? '';
                $dataNascimento = $_POST['data_nascimento'] ?? '';
                $salaId = $_POST['sala_id'] ?? '';
                if ($nome && $sobrenome && $serie && $dataNascimento && $salaId) {
                    $novoAluno = new Aluno($nome, $sobrenome, $serie, $dataNascimento, $salaId);
                    $novoAluno->cadastrarAluno();
                    echo "Aluno cadastrado com sucesso!";
                } else {
                    echo "Dados incompletos para cadastro.";
                }
                break;
            case "R":
                $aluno = new Aluno();
                $resultado = $aluno->listarAluno();
                include_once('../View/ListarAluno.php');
                break;
            default:
                echo "Ação desconhecida!";
                break;
            case "U":
                $id = $_POST['id'] ?? '';
                $nome = $_POST['nome'] ?? '';
                $sobrenome = $_POST['sobrenome'] ?? '';
                $serie = $_POST['serie'] ?? '';
                $dataNascimento = $_POST['data_nascimento'] ?? '';
                $salaId = $_POST['sala_id'] ?? '';
                if ($id && $nome && $sobrenome && $serie && $dataNascimento && $salaId) {
                    $aluno = new Aluno($nome, $sobrenome, $serie, $dataNascimento, $salaId);
                    $aluno->editarAluno($id, $nome, $sobrenome, $serie, $dataNascimento, $salaId);
                    echo "Aluno atualizado com sucesso!";
                } else {
                    echo "Dados incompletos para atualização.";
                }
                break;
            case "D":
                $id = $_POST['id'] ?? '';
                $aluno = new Aluno();
                $aluno->excluirAluno($id);
                echo "Aluno excluído com sucesso!";
                break;
        }
    }

    public function processarDelete($id)
    {
        $aluno = new Aluno();
        $aluno->excluirAluno($id);
        header("Location: ../Controller/AlunoController.php?action=R");
        exit();
    }

    public function processarUpdate($id)
    {
        $nome = $_POST['nome'] ?? '';
        $sobrenome = $_POST['sobrenome'] ?? '';
        $serie = $_POST['serie'] ?? '';
        $dataNascimento = $_POST['data_nascimento'] ?? '';
        $salaId = $_POST['sala_id'] ?? '';
        $aluno = new Aluno();
        $aluno->setNome($nome);
        $aluno->setSobrenome($sobrenome);
        $aluno->setSerie($serie);
        $aluno->setDataNascimento($dataNascimento);
        $aluno->setSalaId($salaId);
        $aluno->editarAluno($id, $nome, $sobrenome, $serie, $dataNascimento, $salaId);
        echo "Aluno atualizado com sucesso!";
    }

    public function processarEdit($id)
    {
        $aluno = new Aluno();
        $alunoAtual = $aluno->buscarAlunoPorId($id);
        if ($alunoAtual) {
            include_once('../View/EditarAluno.php');
        } else {
            echo "Aluno não encontrado!";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $acao = $_GET['action'] ?? '';
    $controller = new AlunoController();
    $controller->processar($acao);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $controller = new AlunoController();
    if (isset($_GET['action'])) {
        $acao = $_GET['action'];
        if ($acao == 'delete' && isset($_GET['id'])) {
            $controller->processarDelete($_GET['id']);
        } elseif ($acao == 'edit' && isset($_GET['id'])) {
            $controller->processarEdit($_GET['id']);
        } else {
            $controller->processar($acao);
        }
    } else {
        echo "Ação não especificada.";
    }
}