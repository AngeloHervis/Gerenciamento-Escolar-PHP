<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica as credenciais do usuário no banco de dados

    // Se as credenciais forem válidas, define a sessão do usuário
    $_SESSION["logged_in"] = true;

    // Verifica se a opção "lembrar senha" foi selecionada
    if ($_POST["lembrar_senha"] == "1") {
        // Define um cookie para "lembrar senha"
        setcookie("lembrar_senha", "1", time() + (86400 * 30), "/");
    } else {
        // Remove o cookie se não estiver selecionado
        setcookie("lembrar_senha", "", time() - 3600, "/");
    }

    // Redireciona o usuário para a página principal
    header("Location: index.php");
    exit;
}
?>
