<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['tipo'] !== 'funcionario') {
    header('Location: ../login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard do Funcionário</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/dashboardfuncionario.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="nav-links">
                <a href="index.html">Home</a>
                <a href="sobre.html">Sobre Nós</a>
                <a href="faleconosco.html">Fale Conosco</a>
            </div>
            <div class="login">
                <img src="/assets/user-icon-svgrepo-com.svg" alt="Login" width="24" height="24">
                <a href="auth.php?logout=true">Logout</a>
            </div>
        </nav>
    </header>
    
    <main>
        <section class="content">
            <div class="title">
                <h1>Bem-vindo, Funcionário!</h1>
            </div>
            <div class="sections">
                <div class="section">
                    <h2>Setor de Aulas</h2>
                    <ul>
                        <li><a href="/Gerenciamento-Escolar-PHP/View/cadastraraula.php">Cadastrar Aula</a></li>
                        <br>
                        <li><a href="/Gerenciamento-Escolar-PHP/View/listaraula.php">Listar Aulas</a></li>
                    </ul>
                </div>
                <div class="section">
                    <h2>Setor de Salas</h2>
                    <ul>
                        <li><a href="/Gerenciamento-Escolar-PHP/View/cadastrarsala.php">Cadastrar Sala</a></li>
                        <br>
                        <li><a href="/Gerenciamento-Escolar-PHP/View/listarsala.php">Listar Salas</a></li>
                    </ul>
                </div>
                <div class="section">
                    <h2>Setor de Funcionários</h2>
                    <ul>
                        <li><a href="/Gerenciamento-Escolar-PHP/View/cadastraroutrofuncionario.php">Cadastrar Funcionário</a></li>
                        <br>
                        <li><a href="/Gerenciamento-Escolar-PHP/View/listaroutrosfuncionarios.php">Listar Funcionários</a></li>
                    </ul>
                </div>
                <div class="section">
                    <h2>Setor de Professores</h2>
                    <ul>
                        <li><a href="/Gerenciamento-Escolar-PHP/View/cadastrarprofessor.php">Cadastrar Professor</a></li>
                        <br>
                        <li><a href="/Gerenciamento-Escolar-PHP/View/listarprofessor.php">Listar Professores</a></li>
                    </ul>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer">
        <p>&copy; 2024 Gerenciamento Escolar. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
