<?php

require_once ("./models/Aluno.php");

class alunoController
{
    private $model;

    function __construct()
    {
        $this->model = new AlunoModel();
    }

    function getAll() {
        $resultData = $this->model->getAll();
        print_r($resultData);
    }

}

?>