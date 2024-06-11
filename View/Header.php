<?php
session_start();
if (!isset($_SESSION["logged_in"]) && !isset($_COOKIE["lembrar_senha"])) {
    header("Location: login.php");
    exit;
}
?>
