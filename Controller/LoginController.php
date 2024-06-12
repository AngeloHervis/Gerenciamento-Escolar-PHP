<?php
session_start();

// Usuários fictícios para exemplo
$usuarios = [
    'professor' => 'senha_professor',
    'funcionario' => 'senha_funcionario'
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (array_key_exists($username, $usuarios) && $usuarios[$username] == $password) {
        $_SESSION["logged_in"] = true;
        $_SESSION["username"] = $username;
        
        if (isset($_POST["lembrar_senha"]) && $_POST["lembrar_senha"] == "1") {
            setcookie("username", $username, time() + (86400 * 30), "/");
            setcookie("password", $password, time() + (86400 * 30), "/");
        }

        if ($username == 'professor') {
            header("Location: ../View/professorView.php");
        } elseif ($username == 'funcionario') {
            header("Location: ../View/funcionarioView.php");
        }
        exit;
    } else {
        header("Location: login.php?error=1");
        exit;
    }
}
?>
