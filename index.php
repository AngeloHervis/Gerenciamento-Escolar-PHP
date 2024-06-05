<?php

require_once ("./controllers/alunoController.php");

$controller = new alunoController();

$action = !empty($_GET["action"]) ? $_GET["action"] :"getAll";

$controller -> {$action}();