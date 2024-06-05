<?php

require_once ("./configuration/connect.php");
class AlunoModel extends Connect
{
    private $table;

    function __construct()
    {
        parent::__construct();
        $this->table = "alunos";
    }

    function getAll()
    {
        $sqlSelect = $this ->connection -> query("SELECT * FROM $this->table");
        $resultQuery = $sqlSelect -> fetchAll();
        return $resultQuery;
    }
}