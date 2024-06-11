<?php
include_once('../Model/Sala.php');

class SalaController
{
    public function processar($acao)
    {
        if ($acao == "C") {
            $numero_sala = $_POST['numero_sala'];
            $capacidade = $_POST['capacidade'];
            $localizacao = $_POST['localizacao'];
            $novaSala = new Sala($numero_sala, $capacidade, $localizacao);
            $novaSala->cadastrarSala();
            echo "Sala cadastrada com sucesso!";
        } elseif ($acao == "R") {
            $sala = new Sala();
            $resultado = $sala->listarSala();
            include_once('../View/listarSala.php');
        } elseif ($acao == "U") {
            $id = $_POST['id'];
            $numero_sala = $_POST['numero_sala'];
            $capacidade = $_POST['capacidade'];
            $localizacao = $_POST['localizacao'];
            $sala = new Sala();
            $sala->editarSala($id, $numero_sala, $capacidade, $localizacao);
            echo "Sala editada com sucesso!";
        } elseif ($acao == "D") {
            $id = $_POST['id'];
            $sala = new Sala();
            $sala->excluirSala($id);
            echo "Sala excluída com sucesso!";
        }
    }

    public function processarDelete($id)
    {
        $sala = new Sala();
        $sala->excluirSala($id);
        header("Location: ../Controller/SalaController.php?action=R");
        exit();
    }

    public function processarUpdate($id)
    {
        $numero_sala = $_POST['numero_sala'];
        $capacidade = $_POST['capacidade'];
        $localizacao = $_POST['localizacao'];
        $sala = new Sala();
        $sala->setNumeroSala($numero_sala);
        $sala->setCapacidade($capacidade);
        $sala->setLocalizacao($localizacao);
        $sala->editarSala($id, $numero_sala, $capacidade, $localizacao);
        echo "Sala atualizada com sucesso!";
    }

    public function processarEdit($id)
    {
        $sala = new Sala();
        $salaAtual = $sala->buscarSalaPorId($id);
        include_once('../View/editarSala.php');
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $acao = $_GET['action'];
    $controller = new SalaController();
    $controller->processar($acao);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $controller = new SalaController();
        $controller->processarDelete($id);
    } elseif (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $controller = new SalaController();
        $controller->processarEdit($id);
    } else {
        $acao = $_GET['action'];
        $controller = new SalaController();
        $controller->processar($acao);
    }
}
