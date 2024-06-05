<?php

define('HOST', 'localhost');
define('DATABASENAME', 'gerenciamento-escolar');
define('USERNAME', 'root');
define('PASSWORD', '');

class Connect
{
    protected $connection;

    function __construct()
    {
        $this->connectDatabase();
    }

    function connectDatabase()
    {
        try {
            $this->connection = new PDO("mysql:host=" . HOST . ";dbname=" . DATABASENAME, USERNAME, PASSWORD);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();
        }
    }
}
