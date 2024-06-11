<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["logged_in"] = true;
    if ($_POST["lembrar_senha"] == "1") {
        setcookie("lembrar_senha", "1", time() + (86400 * 30), "/");
    } else {
        setcookie("lembrar_senha", "", time() - 3600, "/");
    }
    header("Location: Login.php");
    exit;
}
