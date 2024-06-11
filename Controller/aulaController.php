<?php
include_once('../Model/Aula.php');

class AulaController
{
    public function processar($acao)
    {
       if ($acao == "C") {
            $horarioInicio = $_POST['horario_inicio'] ?? '';
            $horarioFim = $_POST['horario_fim'] ?? '';
            $disciplinaId = $_POST['disciplina_id'] ?? '';
            $professorId = $_POST['professor_id'] ?? '';
            $salaId = $_POST['sala_id'] ?? '';
            if ($horarioInicio && $horarioFim && $disciplinaId && $professorId && $salaId) {
                $aula = new Aula($horarioInicio, $horarioFim, $disciplinaId, $professorId, $salaId);
                $aula->cadastrarAula();
                echo "Aula cadastrada com sucesso!";
            } else {
                echo "Dados incompletos para cadastro.";
            }
        } elseif ($acao == "R") {
            $aula = new Aula();
            $resultado = $aula->listarAulas();
            include_once('../View/ListarAulas.php');
        } elseif ($acao == "U") {
            $id = $_POST['id'] ?? '';
            $horarioInicio = $_POST['horario_inicio'] ?? '';
            $horarioFim = $_POST['horario_fim'] ?? '';
            $disciplinaId = $_POST['disciplina_id'] ?? '';
            $professorId = $_POST['professor_id'] ?? '';
            $salaId = $_POST['sala_id'] ?? '';
            if ($id && $horarioInicio && $horarioFim && $disciplinaId && $professorId && $salaId) {
                $aula = new Aula($horarioInicio, $horarioFim, $disciplinaId, $professorId, $salaId);
                $aula->editarAula($id, $horarioInicio, $horarioFim, $disciplinaId, $professorId, $salaId);
                echo "Aula atualizada com sucesso!";
            } else {
                echo "Dados incompletos para atualização.";
            }
        } else if ($acao == "D") {
            $id = $_POST['id'] ?? '';
            $aula = new Aula();
            $aula->excluirAula($id);
            echo "Aula excluída com sucesso!";
        }
    }

    public function processarDelete($id)
    {
        $aula = new Aula();
        $aula->excluirAula($id);
        header("Location: ../Controller/AulaController.php?action=R");
        exit();
    }

    public function processarUpdate($id)
    {
        $horarioInicio = $_POST['horario_inicio'] ?? '';
        $horarioFim = $_POST['horario_fim'] ?? '';
        $disciplinaId = $_POST['disciplina_id'] ?? '';
        $professorId = $_POST['professor_id'] ?? '';
        $salaId = $_POST['sala_id'] ?? '';
        if ($horarioInicio && $horarioFim && $disciplinaId && $professorId && $salaId) {
            $aula = new Aula($horarioInicio, $horarioFim, $disciplinaId, $professorId, $salaId);
            $aula->editarAula($id, $horarioInicio, $horarioFim, $disciplinaId, $professorId, $salaId);
            echo "Aula atualizada com sucesso!";
        } else {
            echo "Dados incompletos para atualização.";
        }
    }

    public function processarEdit($id)
    {
        $aula = new Aula();
        $aulaAtual = $aula->buscarAulaPorId($id);
        if ($aulaAtual) {
            include_once('../View/EditarAula.php');
        } else {
            echo "Aula não encontrada!";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $acao = $_GET['action'] ?? '';
    $controller = new AulaController();
    $controller->processar($acao);
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $controller = new AulaController();
    if (isset($_GET['action'])) {
        $acao = $_GET['action'];
        if ($acao == 'delete' && isset($_GET['id'])) {
            $id = $_GET['id'];
            $controller->processarDelete($id);
        } elseif ($acao == 'edit' && isset($_GET['id'])) {
            $id = $_GET['id'];
            $controller->processarEdit($id);
        } else {
            $controller->processar($acao);
        }
    } else {
        echo "Ação não especificada!";
    }
}
