<?php

class Conexao
{

    private static $conn;

    public static function conectar()
    {
        if (self::$conn === null) {
            try {
                $host = getenv('DB_HOST');
                $dbname = getenv('DB_NAME');
                $user = getenv('DB_USER');
                $pass = getenv('DB_PASS');
                self::$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $erro) {
                echo "Conexão falhou: " . $erro->getMessage();
                self::$conn = null;
            }
        }
        return self::$conn;
    }
}
