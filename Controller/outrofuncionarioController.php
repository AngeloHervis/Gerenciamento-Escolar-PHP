<?php
include_once('../Model/OutroFuncionario.php');

class OutroFuncionarioController
{
    public function processar($acao)
    {
        if ($acao == "C") {
            $nome = $_POST['nome'];
            $cargo = $_POST['cargo'];
            $data_nascimento = $_POST['data_nascimento'];
            $novoOutroFuncionario = new OutroFuncionario($nome, $cargo, $data_nascimento);
            $novoOutroFuncionario->cadastrarOutroFuncionario();
            echo "Funcionário cadastrado com sucesso!";
        } elseif ($acao == "R") {
            $outroFuncionario = new OutroFuncionario();
            $resultado = $outroFuncionario->listarOutroFuncionario();
            include_once('../View/ListarOutrosFuncionarios.php');
        } elseif ($acao == "U") {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $cargo = $_POST['cargo'];
            $data_nascimento = $_POST['data_nascimento'];
            $outroFuncionario = new OutroFuncionario();
            $outroFuncionario->editarOutroFuncionario($id, $nome, $cargo, $data_nascimento);
            echo "Funcionário editado com sucesso!";
        } elseif ($acao == "D") {
            $id = $_POST['id'];
            $outroFuncionario = new OutroFuncionario();
            $outroFuncionario->excluirOutroFuncionario($id);
            echo "Funcionário excluído com sucesso!";
        }
    }

    public function processarDelete($id)
    {
        $outroFuncionario = new OutroFuncionario();
        $outroFuncionario->excluirOutroFuncionario($id);
        header("Location: ../Controller/OutroFuncionarioController.php?action=R");
        exit();
    }

    public function processarUpdate($id)
    {
        $nome = $_POST['nome'];
        $cargo = $_POST['cargo'];
        $data_nascimento = $_POST['data_nascimento'];
        $outroFuncionario = new OutroFuncionario();
        $outroFuncionario->setNome($nome);
        $outroFuncionario->setCargo($cargo);
        $outroFuncionario->setDataNascimento($data_nascimento);
        $outroFuncionario->editarOutroFuncionario($id, $nome, $cargo, $data_nascimento);
        echo "Funcionário atualizado com sucesso!";
    }

    public function processarEdit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['nome'];
            $cargo = $_POST['cargo'];
            $data_nascimento = $_POST['data_nascimento'];

            $outroFuncionario = new OutroFuncionario();
            $outroFuncionario->setId($id);
            $outroFuncionario->setNome($nome);
            $outroFuncionario->setCargo($cargo);
            $outroFuncionario->setDataNascimento($data_nascimento);
            $outroFuncionario->editarOutroFuncionario($id, $nome, $cargo, $data_nascimento);

            header("Location: ../Controller/OutroFuncionarioController.php?action=R");
            exit();
        } else {
            $outroFuncionario = new OutroFuncionario();
            $outroFuncionarioAtual = $outroFuncionario->getOutroFuncionarioById($id);
            include_once('../View/EditarOutroFuncionario.php');
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $acao = $_GET['action'];
    $controller = new OutroFuncionarioController();
    $controller->processar($acao);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $controller = new OutroFuncionarioController();
        $controller->processarDelete($id);
    } elseif (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $controller = new OutroFuncionarioController();
        $controller->processarEdit($id);
    } else {
        $acao = $_GET['action'];
        $controller = new OutroFuncionarioController();
        $controller->processar($acao);
    }
}
