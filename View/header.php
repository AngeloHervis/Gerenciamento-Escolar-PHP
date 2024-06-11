<?php
session_start();
if (!isset($_SESSION["logged_in"]) && !isset($_COOKIE["lembrar_senha"])) {
    // Redireciona para a página de login se não houver sessão ativa e o cookie não estiver definido
    header("Location: login.php");
    exit;
}
?>
