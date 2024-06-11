<?php
include_once('../Model/aula.php');

class AulaController
{
    public function processar($acao)
    {
        if ($acao == "C") {
            $horarioInicio = $_POST['horario_inicio'];
            $horarioFim = $_POST['horario_fim'];
            $disciplinaId = $_POST['disciplina_id'];
            $professorId = $_POST['professor_id'];
            $salaId = $_POST['sala_id'];
            $novaAula = new Aula($horarioInicio, $horarioFim, $disciplinaId, $professorId, $salaId);
            $novaAula->cadastrarAula();
            echo "Aula cadastrada com sucesso!";
        } elseif ($acao == "R") {
            $aula = new Aula();
            $resultado = $aula->listarAulas();
            include_once('../View/listaraula.php');
        }
    }

    public function processarDelete($id)
    {
        $aula = new Aula();
        $aula->excluirAula($id);
        header("Location: ../Controller/aulaController.php?action=R");
        exit();
    }

    public function processarUpdate($id)
    {
        $horarioInicio = $_POST['horario_inicio'];
        $horarioFim = $_POST['horario_fim'];
        $disciplinaId = $_POST['disciplina_id'];
        $professorId = $_POST['professor_id'];
        $salaId = $_POST['sala_id'];
        $aula = new Aula();
        $aula->setHorarioInicio($horarioInicio);
        $aula->setHorarioFim($horarioFim);
        $aula->setDisciplinaId($disciplinaId);
        $aula->setProfessorId($professorId);
        $aula->setSalaId($salaId);
        $aula->atualizarAula($id);
        echo "Aula atualizada com sucesso!";
    }

    public function processarEdit($id)
    {
        $aula = new Aula();
        $aulaAtual = $aula->getId($id);
        include_once('../View/editarAula.php');
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $acao = $_GET['action'];
    $controller = new AulaController();
    $controller->processar($acao);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $controller = new AulaController();
        $controller->processarDelete($id);
    } elseif (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $controller = new AulaController();
        $controller->processarEdit($id);
    } else {
        $acao = $_GET['action'];
        $controller = new AulaController();
        $controller->processar($acao);
    }
}